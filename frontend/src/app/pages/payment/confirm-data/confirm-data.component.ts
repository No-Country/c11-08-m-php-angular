import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { ProvincesCity } from 'src/app/interfaces/provincesCity';
import { AuthService } from 'src/app/services/auth.service';
import { EditUserService } from 'src/app/services/edit-user.service';
import { ProvincesService } from 'src/app/services/provinces.service';

@Component({
  selector: 'app-confirm-data',
  templateUrl: './confirm-data.component.html',
  styleUrls: ['./confirm-data.component.css']
})
export class ConfirmDataComponent implements OnInit {
  imgTeacher = '../../../../assets/images/subscription-page/nocountry (1).png';
  ruta: string = "/payment/finish-profile"
  confirmForm: FormGroup;




  constructor(
    private provincesService: ProvincesService,
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private tService: EditUserService,
  ) {
    this.confirmForm = this.formBuilder.group({
      /* name: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      birthdate: ['', Validators.required],
      selectProvinces: ['', Validators.required],
      phone: ['', Validators.required], */
      name: '',
      lastName: '',
      email: '',
      birthdate: '',
      selectProvinces: '',
      phone: '',
    });
  }

  UserData: any;

  listProvinces: ProvincesCity[] = [];
  get birthdate() {
    return this.confirmForm.get('birthdate');
  }
  get name() {
    return this.confirmForm.get('name')
  }

  get lastName() {
    return this.confirmForm.get('lastName')
  }

  get email() {
    return this.confirmForm.get('email');
  }

  ngOnInit(): void {
    this.authService.currentUser.subscribe(user => {
      this.UserData = user;
      console.log(this.UserData);

      if (this.UserData) {
        this.userName = this.UserData.first_name;
        this.userLastName = this.UserData.last_name;
        this.userEmail = this.UserData.email;
        this.userProvince = this.UserData.province;
        this.userPhone = this.UserData.phone;
      }
    })
    this.getProvinces();
  }

  userName: string = '';
  userLastName: string = '';
  userEmail: string = '';
  userProvince: string = '';
  userPhone?: number;

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

    if (this.confirmForm.invalid) {
      console.log('invalid');
      
      return;
    }
    this.tService.updateTeacher(this.confirmForm.value).subscribe(
      db => {
        console.log('usuario editado');
        
      }
    )
  }
}
