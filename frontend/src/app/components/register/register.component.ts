import { Component, ElementRef, ViewChild } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { AuthService } from 'src/app/services/auth.service';
import { NgbModal, NgbModalRef } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {
  @ViewChild('exampleModalLabel') modal: any;
  modalRef: NgbModalRef | undefined;
  mostrarContrasena: boolean = false;
  tipoContrasena: string = 'password';
  faEye = faEye;
  faEyeSlash = faEyeSlash;
  isLoggedIn = false;
  registerForm: FormGroup;
  loading = false;
  submitted = false;
  error = '';
  showError:boolean = false;

  togglePasswordVisibility() {
    this.mostrarContrasena = !this.mostrarContrasena;
    this.tipoContrasena = this.mostrarContrasena ? 'text' : 'password';
  }

 

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private modalService: NgbModal
  ) {
    this.registerForm = this.formBuilder.group({
      first_name: ['', Validators.required],
      last_name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      role: ['', Validators.required],
      password: ['', [Validators.required, Validators.minLength(6)]],
      password_confirmation: ['', Validators.required]
    });
  }

  get first_name(){
    return this.registerForm.get('first_name')
  }

  get last_name(){
    return this.registerForm.get('last_name')
  }

  get email()
  {
    return this.registerForm.get('email');
  }

  get role(){
    return this.registerForm.get('role')
  }

  get password()
  {
    return this.registerForm.get('password');
  }

  get password_confirmation(){
    return this.registerForm.get('password_confirmation')
  }


  closeModal(): void {
    this.modalRef?.dismiss();
  }


  onRegisterFormSubmit() {
    this.submitted = true;
    console.log(this.registerForm.value)
    if (this.registerForm.invalid) {
      return;
    }
    this.loading = true;
    this.authService.register(this.registerForm.value)
    .subscribe({
      next: (data: any) => {
        console.log(data);
        this.loading = false;
        this.isLoggedIn = true;
        this.closeModal();
      },
      error: (error) => {
        console.log(error);
        this.error = error;
        this.showError = true;
        this.loading = false;
      }
    });}

  
}
