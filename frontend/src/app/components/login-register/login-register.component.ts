import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-login-register',
  templateUrl: './login-register.component.html',
  styleUrls: ['./login-register.component.css']
})
export class LoginRegisterComponent  {
  isLoggedIn = false;
  showModal = false;

  mostrarContrasena: boolean = false;
  tipoContrasena: string = 'password';
  faEye = faEye;
  faEyeSlash = faEyeSlash;
  loginForm: FormGroup;

  loading = false;
  submitted = false;
  error = '';





  togglePasswordVisibility() {
    this.mostrarContrasena = !this.mostrarContrasena;
    this.tipoContrasena = this.mostrarContrasena ? 'text' : 'password';
  }

 

  constructor(
    private formBuilder: FormBuilder,
    public authService: AuthService,
  ) {
    this.loginForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]]
    });
  }

  get Email()
  {
    return this.loginForm.get('email');
  }

  get Password()
  {
    return this.loginForm.get('password');
  }


  onLoginFormSubmit() {
    this.submitted = true;

    if (this.loginForm.invalid) {
      return;
    }

    this.loading = true;
    this.authService.Login(this.loginForm.value)
      .subscribe(
        (data: any) => {
          console.log(data);
          this.loading = false;
          this.isLoggedIn = true;
         
        },
        error => {
          console.error(error);
          this.error = 'Error al iniciar sesión';
          this.loading = false;
        }
      );
  }


}
