import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { ProvincesCity } from 'src/app/interfaces/provincesCity';
import { AuthService } from 'src/app/services/auth.service';
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
  ) {
    this.confirmForm = this.formBuilder.group({
      name: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
    });
  }

  UserData : any;

  listProvinces: ProvincesCity[] = [];
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
      this.userName = this.UserData.first_name;
      this.userLastName = this.UserData.last_name;
    })
    this.getProvinces();
  }

  userName : string = '';
  userLastName: string ='';

  getProvinces(): void {
    this.provincesService.getProvinces().subscribe(
      res => {
        this.listProvinces = res;
      },
      err => console.log(err)
    );
  }

  onEnviar(event: Event) {
    //console.log(this.confirmForm);

    /* event.preventDefault();
    if (this.confirmForm.valid) {
      console.log(JSON.stringify(this.confirmForm.value));
      this.autenticarService.loginUser(this.confirmForm.value).subscribe(db => {
        console.log("DATA: " + JSON.stringify(db.id));
        if (db.id) {
          alert("Puedes editar el portfolio");
          this.ruta.navigate(['/dashboard']);
          this.confirmForm.reset()
        } else {
          alert("Error al iniciar sesión, credenciales no válidas!!!");
        }
      }, err => {
        alert("ERROR!!!");
      })
    } else {
      sessionStorage.setItem('currentUser', "");
      alert("Error! No tienes acceso");
      this.ruta.navigate(['/']);
    } */
  } 
}
