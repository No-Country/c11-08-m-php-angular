import { FilterTeacher } from './../../interfaces/filterTeacher';
import { CityService } from './../../services/city.service';
import { City } from './../../interfaces/city';
import { ProvincesCity } from './../../interfaces/provincesCity';
import { ProvincesService } from './../../services/provinces.service';
import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { TeacherService } from './../../services/teacher.service';
import { AfterViewInit, Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Route, Router } from '@angular/router';
import { faGraduationCap, faLocationDot, faCaretDown } from '@fortawesome/free-solid-svg-icons';
import { Teacher } from 'src/app/interfaces/teacher';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit {
  faCaretDown = faCaretDown

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private teacherService: TeacherService,
    private subjectsService: SubjectsService,
    private provincesService: ProvincesService,
    private cityService: CityService
  ) { }
  materiaSelectHomeNom = '';
  materiaSelectHomeId: number = 0;
  numTeachers: number = 0;
  teachers: Teacher[] = [];
  listSubjects: Subjects[] = [];
  listProvinces: ProvincesCity[] = [];
  listCitys: City[] = [];

  selectedOption: Subjects | null = null;

  filteredSubjects: Subjects[] = [];
  searchText: string = '';
  inputText: string = '';

  ngOnInit(): void {
    this.materiaSelectHomeNom = this.route.snapshot.queryParams['seleValue'];
    this.getSubjects(this.route.snapshot.queryParams['seleId']);
    this.getfilterTeachers();
    this.getProvinces();
    this.seleccionarOpcion()
  }

  getfilterTeachers(): void {
    const selectCitys = document.getElementById('selectCitys') as HTMLSelectElement | null;
    const selectProvinces = document.getElementById('selectProvinces') as HTMLSelectElement | null;

    if (selectCitys && selectProvinces) {
      const filterTeacher: FilterTeacher = {
        subject: this.materiaSelectHomeNom ? this.materiaSelectHomeNom : '',
        city: selectCitys.value !== '' ? selectCitys.value : '',
        province: selectProvinces.value !== '' ? selectProvinces.value : '',
        availability: [],
        price: [],
        order: ''
      };

      this.teacherService.getfilterTeachers(filterTeacher).subscribe(
        res => {
          this.teachers = res;
          this.numTeachers = res.length;
        },
      );
    }
  }

  getSubjects(selectedIndex: number): void {
    this.subjectsService.getSubjects().subscribe(
      res => {
        this.listSubjects = res;
        this.materiaSelectHomeId = selectedIndex;
        this.selectedOption = this.listSubjects.find(subject => subject.id === selectedIndex) || null;
        this.searchText = this.selectedOption ? 'Aprende: ' + this.selectedOption.name : '';
        this.filterSubjects(); // Aplicar filtro inicial
        this.getfilterTeachers(); // Llamar a getfilterTeachers después de obtener las asignaturas
      },
      err => console.log(err)
    );
  }
  

  getProvinces(): void {
    this.provincesService.getProvinces().subscribe(
      res => {
        this.listProvinces = res;
      },
      err => console.log(err)
    );
  }

  getCitys() {
    const selectProvinces = document.getElementById('selectProvinces') as HTMLSelectElement;
    if (selectProvinces.value !== '') {
      this.cityService.getCitys(Number(selectProvinces.value)).subscribe(
        res => {
          this.listCitys = res;
          this.getfilterTeachers();
        },
        error => {
          console.log(error);
        }
      );
    } else {
      this.listCitys = [];
      this.getfilterTeachers();
    }
  }

  seleccionarOpcion(subject?: Subjects) {
    if (subject) {
      this.selectedOption = subject;
      this.searchText = 'Aprende: ' + subject.name;
    } else {
      if (this.selectedOption) {
        this.searchText = 'Aprende: ' + this.selectedOption.name;
        this.filterSubjects(); // Aplicar filtro según el texto de búsqueda
        this.getfilterTeachers(); // Obtener la nueva lista de profesores con los filtros actualizados
      }
    }
  }
  
 

  filterSubjects() {
    this.filteredSubjects = this.listSubjects.filter(subject =>
      subject.name.toLowerCase().includes(this.searchText.toLowerCase())
    );
  }
}

