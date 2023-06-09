import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { DomSanitizer } from '@angular/platform-browser';
import { Router, RouterLink } from '@angular/router';
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
  user = localStorage.getItem('currentUser');
  userId: number = 0;
  userName: string = '';
  userLastName: string = '';
  userEmail: string = '';
  userProvince: string = '';
  userPhone?: number;
  
  previsualizacion: string = '../../../../assets/images/subscription-page/nocountry (1).png';





  constructor(
    private provincesService: ProvincesService,
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private tService: EditUserService,
    private router: Router,
    private sanitizer: DomSanitizer, 

  ) {
    this.confirmForm = this.formBuilder.group({
      first_name: '',
      last_name: '',
      email: '',
      birthdate: '',
      photo: '',
      selectProvinces: '',
      phone: '',
      identification: '',
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
      if (user.photo !== null) {
        this.previsualizacion = user.photo;
        console.log('sera');
        
      }
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

  get photo() {
    return this.confirmForm.get('photo');
  }
  
  
  capturarFile(event:any) {
    const archivoCapturado = event.target.files[0]
    this.extraerBase64(archivoCapturado).then((imagen: any) => {
      this.previsualizacion = imagen.base;
    })

  }



  extraerBase64 = async ($event: any) => new Promise((resolve) => {
    try {
      const unsafeImg = window.URL.createObjectURL($event);
      const image = this.sanitizer.bypassSecurityTrustUrl(unsafeImg);
      const reader = new FileReader();
      reader.readAsDataURL($event);
      reader.onload = () => {
        resolve({
          base: reader.result
        });
      };
      reader.onerror = error => {
        resolve({
          base: null
        });
      };

    } catch (e) {
      resolve({
        base: null
      });
    }
  });

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
