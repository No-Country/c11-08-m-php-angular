import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { faCamera, faTShirt } from '@fortawesome/free-solid-svg-icons';
import { Subjects } from 'src/app/interfaces/subjects';
import { SubjectsService } from 'src/app/services/subjects.service';

@Component({
  selector: 'app-finish-profile',
  templateUrl: './finish-profile.component.html',
  styleUrls: ['./finish-profile.component.css']
})
export class FinishProfileComponent implements OnInit {
  imgTeacher = '../../../../assets/images/subscription-page/image 135.png';

  faCamera = faCamera;
  finishForm : FormGroup;
  faTShirt = faTShirt;

  constructor(
    private formBuilder: FormBuilder,
    private subjectsService: SubjectsService,
    ) {
      this.finishForm = this.formBuilder.group({
        name: ['', Validators.required],
        lastName: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
      });
    }

    listSubjects: Subjects[]=[];

    ngOnInit(): void {
      this.getSubjects();
    }

    getSubjects(): void {
      this.subjectsService.getSubjects().subscribe(
        res =>{
          this.listSubjects = res;
        },
        err=>console.log(err)
      );
    }
}
