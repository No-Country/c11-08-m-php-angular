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

 
  materiaSelectHomeNom = '';
  materiaSelectHomeId: number = 0;
  numTeachers: number = 0;
  teachers: Teacher[] = [];
  listSubjects: Subjects[] = [];
  listProvinces: ProvincesCity[] = [];
  listCitys: City[] = [];
  filteredTeachers: Teacher[] = [];
  selectedOption: Subjects | null = null;

  filteredSubjects: Subjects[] = [];
  searchText: string = '';

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private teacherService: TeacherService,
    private subjectsService: SubjectsService,
    private provincesService: ProvincesService,
    private cityService: CityService
  ) { }

  ngOnInit(): void {
    this.materiaSelectHomeNom = this.route.snapshot.queryParams['seleValue'];
    this.materiaSelectHomeId = Number(this.route.snapshot.queryParams['seleId']);
    this.getSubjects();
    this.getProvinces();
    this.filteredTeachers = this.teachers;
  }

  getSubjects(): void {
    this.subjectsService.getSubjects().subscribe(
      res => {
        this.listSubjects = res;
        this.selectedOption = this.listSubjects.find(subject => subject.id === this.materiaSelectHomeId) || null;
        this.searchText = this.selectedOption ? 'Aprende: ' + this.selectedOption.name : '';
        this.filterSubjects();
        this.getfilterTeachers();
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

  getCitys(): void {
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

  getfilterTeachers(): void {
    const selectSubjects = this.selectedOption ? this.selectedOption.name : '';
    const selectCitys = (document.getElementById('selectCitys') as HTMLSelectElement)?.value || '';
    const selectProvinces = (document.getElementById('selectProvinces') as HTMLSelectElement)?.value || '';

    const filterTeacher: FilterTeacher = {
      subject: selectSubjects,
      city: selectCitys,
      province: selectProvinces,
      availability: [],
      price: [],
      order: ''
    };

    this.teacherService.getfilterTeachers(filterTeacher).subscribe(
      res => {
        this.teachers = res;
        this.numTeachers = res.length;
      },
      err => console.log(err)
    );
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