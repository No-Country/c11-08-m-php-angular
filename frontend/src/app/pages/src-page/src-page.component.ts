import { FilterTeacher } from './../../interfaces/filterTeacher';
import { CityService } from './../../services/city.service';
import { City } from './../../interfaces/city';
import { ProvincesCity } from './../../interfaces/provincesCity';
import { ProvincesService } from './../../services/provinces.service';
import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { TeacherService } from './../../services/teacher.service';
import { AfterContentInit, Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { faGraduationCap, faLocationDot, faCaretDown } from '@fortawesome/free-solid-svg-icons';
import { Teacher } from 'src/app/interfaces/teacher';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit, AfterContentInit {


  // precio: string = 'Cualquiera';
  // turno: string = 'Cualquiera';
  // provinciasArgentina: string[] = [
  //   'Buenos Aires',
  //   'Catamarca',
  //   'Chaco',
  //   'Chubut',
  //   'Córdoba',
  //   'Corrientes',
  //   'Entre Ríos',
  //   'Formosa',
  //   'Jujuy',
  //   'La Pampa',
  //   'La Rioja',
  //   'Mendoza',
  //   'Misiones',
  //   'Neuquén',
  //   'Río Negro',
  //   'Salta',
  //   'San Juan',
  //   'San Luis',
  //   'Santa Cruz',
  //   'Santa Fe',
  //   'Santiago del Estero',
  //   'Tierra del Fuego, Antártida e Islas del Atlántico Sur',
  //   'Tucumán'
  // ];

  // provincia: string = 'Cualquiera';

  // busqueda(valor: Event){
  //   this.materiaSelectHomeNom = (<HTMLInputElement>event?.target).value;
  // }

  // seleccionarProvincia(prov: string) {
  //   this.provincia = prov;
  // }

  // disponibilidad: string = 'Cualquiera';

  // faGraduationCap = faGraduationCap;
  // faLocationDot = faLocationDot;
  faCaretDown = faCaretDown

  constructor(
    private route: ActivatedRoute,
    private teacherService: TeacherService,
    private subjectsService: SubjectsService,
    private provincesService: ProvincesService,
    private cityService: CityService
  ) { }

  materiaSelectHomeNom= "";
  materiaSelectHomeId: number= 0;
  numTeachers: number = 0;
  teachers: Teacher[]=[];
  listSubjects: Subjects[]=[];
  listProvinces: ProvincesCity[]=[];
  listCitys: City[]=[];

  ngOnInit(): void {
    this.materiaSelectHomeNom = this.route.snapshot.queryParams['seleValue'];
    this.materiaSelectHomeId = this.route.snapshot.queryParams['seleId'];

    this.getSubjects();
    this.getfilterTeachers();
    this.getProvinces();
  }
  ngAfterContentInit(): void{
    const selectSubjects = document.getElementById('selectSubjects') as HTMLSelectElement;
    selectSubjects.selectedIndex = this.materiaSelectHomeId;
  }

  getfilterTeachers(): void {

    const selectSubjects = document.getElementById('selectSubjects') as HTMLSelectElement;
    const selectedOption = selectSubjects.options[selectSubjects.selectedIndex];
    const selectedText = selectedOption ? selectedOption.textContent?.trim() : "";

    const selectCitys = document.getElementById('selectCitys') as HTMLSelectElement;
    const selectProvinces = document.getElementById('selectProvinces') as HTMLSelectElement;

    const filterTeacher: FilterTeacher = {
      subject: selectedText ? (selectedText) : "",
      city: selectCitys.value !== "" ? (selectCitys.value) : "",
      province: selectProvinces.value !== "" ? (selectProvinces.value) : "",
      availability: [],
      price: [],
      order: ""
    };
    // console.log(filterTeacher);

    this.teacherService.getfilterTeachers(filterTeacher).subscribe(
      res =>{
        this.teachers = res;
        this.numTeachers = res.length;
        console.log(res);

      },
      err=>{
        this.teachers = [];
        this.numTeachers = 0;
      }
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


