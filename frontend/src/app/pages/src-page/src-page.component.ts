import { FilterTeacher } from './../../interfaces/filterTeacher';
import { CityService } from './../../services/city.service';
import { City } from './../../interfaces/city';
import { ProvincesCity } from './../../interfaces/provincesCity';
import { ProvincesService } from './../../services/provinces.service';
import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { TeacherService } from './../../services/teacher.service';
import { AfterViewInit, Component, ElementRef, OnInit, Query, ViewChild } from '@angular/core';
import { ActivatedRoute, Route, Router } from '@angular/router';
import { faGraduationCap, faLocationDot, faCaretDown } from '@fortawesome/free-solid-svg-icons';
import { Teacher } from 'src/app/interfaces/teacher';
import { FormControl } from '@angular/forms';
import { debounceTime } from 'rxjs';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit {
  faCaretDown = faCaretDown;
  control = new FormControl();
  precio: string = '';  //TODO:precio y turno por implementar
  turno: string= '';
  materiaSelectHomeNom = '';
  materiaSelectHomeId: number = 0;
  numTeachers: number = 0;


  CopiaTeachers: Teacher[] = [];
  teachers: Teacher[] = []; // arreglo de profesores filtrado por materia.
  filteredTeachersByProvince: Teacher[] = [];

  filteredSubjects: Subjects[] = [];

  
  listSubjects: Subjects[] = [];
  selectedOption: Subjects | null = null;
  cities: City[] = [];
  listProvincesCity: ProvincesCity[] = [];
  selectedProvinceCity: ProvincesCity | null = null;
  filteredTeachers: Teacher[] = [];
  searchText: string = '';
  page: number = 1;

 
  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private teacherService: TeacherService,
    private subjectsService: SubjectsService,
    private provincesService: ProvincesService,
    private cityService: CityService
  ) {}

  ngOnInit(): void {

    this.materiaSelectHomeNom = this.route.snapshot.queryParams['seleValue'];
    this.materiaSelectHomeId = Number(this.route.snapshot.queryParams['seleId']);
    this.getSubjects();
    this.filteredTeachers = this.teachers;
    this.observarChangeSearch();
    console.log(this.listSubjects);
    console.log(this.materiaSelectHomeId)
    console.log(this.teachers);
  }

  observarChangeSearch() {
    this.control.valueChanges.pipe(debounceTime(500)).subscribe((query) => {
      this.getProvinceCity(query);
    });
  }

  getProvinceCity(query: string) {
    this.cityService.getProvinceCityByQuery(query).subscribe((result) => {
      this.listProvincesCity = result;
     
    });
    
  }

  //separa la provincia de la ciudad y selecciona 
  selectProvinceCity(provinceCity: ProvincesCity): void {
    if (provinceCity && provinceCity.city) {
      this.teachers = this.CopiaTeachers;
      this.selectedProvinceCity = provinceCity;
      const selectedCity = provinceCity.city.split(',')[1].trim();
      this.filterTeachersByProvince(selectedCity);
     this.teachers = this.teachers.filter((teacher)=>teacher.province_name== selectedCity)
      console.log(this.filterTeachersByProvince, 'byprovince')
    }
  }
  
  selectedPrice(minPrice: number, maxPrice: number) {
    this.teachers = this.filteredTeachers;
    let filteredTeachers = this.teachers.filter((teacher) => {
      console.log(teacher.price_one_class, 'precio clase')
      const price = parseFloat(teacher.price_one_class.replace('.', ''));
      console.log(price)
      const condition = price >= minPrice && price <= maxPrice;
      console.log(price, minPrice, maxPrice, condition);
      return condition;
    });
    
    //TODO: filtro para ordenar por valor
    // filteredTeachers = filteredTeachers.sort((a, b) => a.price_one_class - b.price_one_class);
  
    this.teachers = filteredTeachers;
    console.log(filteredTeachers, 'lista filtrada por precio');
  }
  
  
  
  
  

  getSubjects(): void {
    this.subjectsService.getSubjects().subscribe(
      (res) => {
        this.listSubjects = res;
        this.selectedOption = this.listSubjects.find((subject) => subject.id === this.materiaSelectHomeId) || null;
        this.searchText = this.selectedOption ? 'Aprende: ' + this.selectedOption.name : '';
        this.filterSubjects();
        this.getfilterTeachers();
      },
      (err) => console.log(err)
    );
  }

  getfilterTeachers(): void {
    const selectSubjects = this.selectedOption ? this.selectedOption.name : '';
    const selectCity = this.selectedProvinceCity ? this.selectedProvinceCity.city.split(',')[0].trim() : '';

    const filterTeacher: FilterTeacher = {
      subject: selectSubjects,
      city: selectCity,
      availability: [],
      price: [],
      order: '',
    };

    this.teacherService.getfilterTeachers(filterTeacher).subscribe(
      (res) => {
        this.teachers = res;
        this.filteredTeachersByProvince = res;
        this.CopiaTeachers = res;
        this.filteredTeachers = this.teachers; // Actualiza la lista de profesores filtrados
        this.numTeachers = res.length;
        console.log(res, "arreglo actual")
      },
      (err) => console.log(err)
    );
  }

  filterTeachersByProvince(selectedCity: string): void {
  if (selectedCity === '') {
    this.filteredTeachers = this.teachers;
  } else {
    this.filteredTeachers = this.teachers.filter(
      (teacher) => teacher.province_name.trim().toLowerCase() === selectedCity.toLowerCase()
    );
  }
  this.numTeachers = this.filteredTeachers.length;
}

  filterSubjects(): void {
    this.filteredSubjects = this.listSubjects.filter(subject =>
      subject.name.toLowerCase().includes(this.searchText.toLowerCase())
    );
  }

  seleccionarOpcion(subject?: Subjects): void {
    if (subject) {
      this.selectedOption = subject;
      this.searchText = 'Aprende: ' + subject.name;
    } else {
      if (this.selectedOption) {
        this.searchText = 'Aprende: ' + this.selectedOption.name;
      }
    }
    this.filterSubjects();
    this.getfilterTeachers();
  }
}

