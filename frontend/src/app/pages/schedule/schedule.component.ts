import { Component, Input } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { faStar } from '@fortawesome/free-regular-svg-icons';
import { faStar as StarSolid, faAngleLeft} from '@fortawesome/free-solid-svg-icons'
import { faAngleRight, faLocationDot, faStarHalf, faUser } from '@fortawesome/free-solid-svg-icons';
import { Month, months} from 'src/app/interfaces/months';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-schedule',
  templateUrl: './schedule.component.html',
  styleUrls: ['./schedule.component.css']
})

export class ScheduleComponent {
faAngleRight = faAngleRight
faLocationDot = faLocationDot;
faUser = faUser;
faStar = faStar;
faStarSolid = StarSolid;
faAngleLeft = faAngleLeft;
profesor = 'Esteban gonzales'
formSubmitted: boolean = false;



weekDays: string[] = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
months: Month[] = months;
daysArray: number[] = [];
startDayOfWeek: number = 0;
selectSchedule: string ="08h a 09h";
selectedMonth: Month | null = null;
selectedMonthIndex: number = 0;
selectedDayIndex: number | null = null;
selectedDayName: string | null = null;



constructor(private router:Router,
  private route:ActivatedRoute,
  public authService: AuthService) {}


id: number = 0;
name:string = '';
email:string = '';
total_students: number = 0;
total_reviews:number = 0;
city_name: string = '';
province_name:string = '';
photo:string = '';
user_id:number = 0;
rating = 4.5;

ngOnInit() {
  const currentDate = new Date();
  const currentMonth = currentDate.getMonth();
  this.selectedMonthIndex = currentMonth;
  this.selectedMonth = this.months[currentMonth];
  this.generateDaysArray(this.selectedMonth.days);
  this.calculateStartDayOfWeek(this.selectedMonth);
  this.route.queryParams.subscribe(params=>{
    this.id = params['id'];
    this.name = params['name']
    this.email = params['email'];
    this.total_students = params['total_students']
    this.total_reviews = params['total_reviews'];
    this.city_name = params['city_name'];
    this.province_name = params['province_name']
    this.photo = params['photo'];
    this.user_id = params['user_id'];
    this.rating= params['average']; 
  })
}
 
showWarning = false;

validateFields() {
  if (!this.selectedDayIndex || !this.selectSchedule) {
    this.showWarning = true;
  } else {
    this.showWarning = false;
   
  }
}

previousMonth() {
  if (this.selectedMonthIndex > 0) {
    this.selectedMonthIndex--;
  } else {
    this.selectedMonthIndex = this.months.length - 1;
  }
  this.selectedMonth = this.months[this.selectedMonthIndex];
  this.generateDaysArray(this.selectedMonth.days);
  this.calculateStartDayOfWeek(this.selectedMonth);
}

nextMonth() {
  if (this.selectedMonthIndex < this.months.length - 1) {
    this.selectedMonthIndex++;
  } else {
    this.selectedMonthIndex = 0;
  }
  this.selectedMonth = this.months[this.selectedMonthIndex];
  this.generateDaysArray(this.selectedMonth.days);
  this.calculateStartDayOfWeek(this.selectedMonth);
}

selectMonth(month: Month) {
  this.selectedMonth = month;
  this.calculateStartDayOfWeek(month); 
  console.log(this.selectedMonth);
}

generateDaysArray(numDays: number) {
  this.daysArray = Array.from({ length: numDays }, (_, i) => i + 1);
}

selectDay(day: number) {
  this.selectedDayIndex = day;
  const startDay = this.startDayOfWeek;
  const dayOfWeek = (day + startDay - 1) % 7; 
  this.selectedDayName = this.weekDays[dayOfWeek];
  console.log("Día seleccionado:", day);
  console.log("Nombre del día:", this.selectedDayName);
}

calculateStartDayOfWeek(month: Month) {
  const year = new Date().getFullYear(); 
  const startDate = new Date(year, month.number - 1, 1); 
  let startDay = startDate.getDay();
  if (startDay === 0) {
    startDay = 6; 
  } else {
    startDay -= 1; 
  }
  this.startDayOfWeek = startDay;
  console.log(this.startDayOfWeek); 
}

getColumnStart(index: number): number {
  return (index + this.startDayOfWeek) % 7 + 1; 
}

}
