import { FilterTeacher } from './../../interfaces/filterTeacher';
import { CityService } from './../../services/city.service';
import { City } from './../../interfaces/city';
import { ProvincesCity } from './../../interfaces/provincesCity';
import { ProvincesService } from './../../services/provinces.service';
import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { TeacherService } from './../../services/teacher.service';
import { Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { faGraduationCap, faLocationDot, faCaretDown } from '@fortawesome/free-solid-svg-icons';
import { Teacher } from 'src/app/interfaces/teacher';


@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit{

  elegir= "";
  precio: string = 'Cualquiera';
  turno: string = 'Cualquiera';


  provincia: string = 'Cualquiera';

  busqueda(valor: Event){
    this.elegir = (<HTMLInputElement>event?.target).value;
  }

  seleccionarProvincia(prov: string) {
    this.provincia = prov;
  }

  disponibilidad: string = 'Cualquiera';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  faCaretDown = faCaretDown

  constructor(
    private route: ActivatedRoute,
    private teacherService: TeacherService,
    private subjectsService: SubjectsService,
    private provincesService: ProvincesService,
    private cityService: CityService
  ) { }

  teachers: Teacher[]=[];
  listSubjects: Subjects[]=[];
  listProvinces: ProvincesCity[]=[];
  listCitys: City[]=[];

  ngOnInit(): void {
    this.elegir = this.route.snapshot.queryParams['seleccion'];
    this.getTeachers();
    // this.getfilterTeachers();
    this.getSubjects();
    this.getProvinces();
  }

  getfilterTeachers(): void {

    const selectCitys = document.getElementById('selectCitys') as HTMLSelectElement;
    const selectProvinces = document.getElementById('selectProvinces') as HTMLSelectElement;
    const selectSubjects = document.getElementById('selectSubjects') as HTMLSelectElement;

    const filterTeacher: FilterTeacher = {
      subject: selectSubjects ? Number(selectSubjects.value) : null,
      city: selectCitys.value !== "" ? Number(selectCitys.value) : null,
      province: selectProvinces.value !== "" ? Number(selectProvinces.value) : null,
      availability: null,
      price: null,
      order: null
    };

    console.log(filterTeacher);

    this.teacherService.getfilterTeachers(filterTeacher).subscribe(
      res =>{
        this.teachers = res;
      },
      err=>{
        this.teachers = [];
        // console.log(err)
      }
    );
  }

  getTeachers(): void {
    this.teacherService.getTeachers().subscribe(
      res =>{
        this.teachers = res;
        console.log(res);
      },
      err=>console.log(err)
    );
  }

  getSubjects(): void {
    this.subjectsService.getSubjects().subscribe(
      res =>{
        this.listSubjects = res;
      },
      err=>console.log(err)
    );
  }
  getProvinces(): void {
    this.provincesService.getProvinces().subscribe(
      res =>{
        this.listProvinces = res;
      },
      err=>console.log(err)
    );
  }

  getCitys() {
    const selectProvinces = document.getElementById('selectProvinces') as HTMLSelectElement;
    if( selectProvinces.value !== "" ){
      this.cityService.getCitys( Number(selectProvinces.value) ).subscribe(
        res => {
          this.listCitys = res;
        },
        error => {
        }
      );
    }else{
      this.listCitys = [];
    }
    this.getfilterTeachers();
  }
}


