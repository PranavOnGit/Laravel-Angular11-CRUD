import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {
  
  appTitle: String = 'Laravel-Ng11';
  
  Activeu: boolean = false;  
  Activeh: boolean = true;  
  constructor() { }

  ngOnInit(): void {
    
  }
  isActiveU(){
    this.Activeu = true;
    this.Activeh = false;
  }
  isActiveH(){
    this.Activeh = true;
    this.Activeu = false;
  }
}
