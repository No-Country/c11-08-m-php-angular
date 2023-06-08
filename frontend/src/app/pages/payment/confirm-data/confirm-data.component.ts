import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { ProvincesCity } from 'src/app/interfaces/provincesCity';
import { AuthService } from 'src/app/services/auth.service';
import { EditUserService } from 'src/app/services/edit-user.service';
import { ProvincesService } from 'src/app/services/provinces.service';
import { NumericLiteral } from 'typescript';

@Component({
  selector: 'app-confirm-data',
  templateUrl: './confirm-data.component.html',
  styleUrls: ['./confirm-data.component.css']
})
export class ConfirmDataComponent implements OnInit {
  imgTeacher = '../../../../assets/images/subscription-page/nocountry (1).png';
  ruta: string = "/payment/finish-profile"
  confirmForm: FormGroup;
  user = localStorage.getItem('currentUser');
  userId: number = 0;
  userName: string = '';
  userLastName: string = '';
  userEmail: string = '';
  userProvince: string = '';
  userPhone?: number;



  constructor(
    private provincesService: ProvincesService,
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private tService: EditUserService,
    private router: Router
  ) {
    this.confirmForm = this.formBuilder.group({
      /* name: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      birthdate: ['', Validators.required],
      selectProvinces: ['', Validators.required],
      phone: ['', Validators.required], */
      first_name: '',
      last_name: '',
      email: '',
      birthdate: '',
      identification: '',
      phone: '',
      photo: '',
      city_id: '',
    });
  }

  ngOnInit(): void {



    const user = this.authService.getCurrentUser();
    console.log(this.user + "test");
    
    if (user) {
      this.userId = user.id;
      this.userName = user.first_name;
      this.userLastName = user.last_name;
      this.userEmail = user.email;
      this.userProvince = user.province;
      this.userPhone = user.phone;
      console.log(this.userEmail);
      
    }
    this.getProvinces();
  }

  UserData: any;

  listProvinces: ProvincesCity[] = [];
  get birthdate() {
    return this.confirmForm.get('birthdate');
  }
  get name() {
    return this.confirmForm.get('first_name')
  }

  get lastName() {
    return this.confirmForm.get('last_name')
  }

  get email() {
    return this.confirmForm.get('email');
  }

  
  

  getProvinces(): void {
    this.provincesService.getProvinces().subscribe(
      res => {
        this.listProvinces = res;
      },
      err => console.log(err)
    );
  }

  Enviar() {
    console.log(this.confirmForm.value)
    console.log('respuesta');
    console.log(this.userName);
    
    if (this.confirmForm.invalid) {
      console.log('invalid');

      return;
    }
    this.tService.updateTeacher(this.userId, this.confirmForm.value).subscribe(
      db => {
        console.log('usuario editado');
        this.router.navigate(['/payment/finish-profile'])
      }
    )
  }
}
