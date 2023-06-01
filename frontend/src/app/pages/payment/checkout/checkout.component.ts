import { Component } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css']
})
export class CheckoutComponent {
  constructor(private router: Router) {}
  
  redirect(){
    this.router.navigateByUrl('/payment/confirm-data');
  }

}
