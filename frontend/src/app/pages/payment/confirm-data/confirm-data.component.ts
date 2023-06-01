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

  
  confirmForm: FormGroup;
  
  
  
  
  constructor(
    private provincesService: ProvincesService,
    private formBuilder: FormBuilder,
    ) {
      this.confirmForm = this.formBuilder.group({
        name: ['', Validators.required],
        lastName: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
      });
    }
    
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
