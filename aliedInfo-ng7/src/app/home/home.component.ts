import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor() { }

  h1Style: boolean = false;
  ngOnInit(): void {
  }

  clickMe(){
    this.h1Style = true;
    console.log('clicked!');
    
  }

}
