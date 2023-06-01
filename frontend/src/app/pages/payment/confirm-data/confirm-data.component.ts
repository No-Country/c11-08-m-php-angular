import { Component } from '@angular/core';
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
export class ConfirmDataComponent {
  imgTeacher = '../../../../assets/images/subscription-page/nocountry (1).png';

  
  registerForm: FormGroup;
  
  
  
  
  constructor(
    private provincesService: ProvincesService,
    private formBuilder: FormBuilder,
    ) {
      this.registerForm = this.formBuilder.group({
        name: ['', Validators.required],
        lastName: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
      });
    }
    
    listProvinces: ProvincesCity[] = [];
  get name() {
    return this.registerForm.get('name')
  }

  get lastName() {
    return this.registerForm.get('lastName')
  }

  get email() {
    return this.registerForm.get('email');
  }

  ngOnInit(): void {

    this.getProvinces();
  }
  getProvinces(): void {
    this.provincesService.getProvinces().subscribe(
      res => {
        this.listProvinces = res;
      },
      err => console.log(err)
    );
  }

}
