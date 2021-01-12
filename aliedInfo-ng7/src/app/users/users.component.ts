import { Component, OnInit } from '@angular/core';
import {UserDataService} from '../user-data.service';
import {  User} from "../User";  
import { Observable } from "rxjs"; 
import {NgbModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import { FormBuilder, FormGroup, Validators} from '@angular/forms';
import { HttpClient, HttpHeaders} from '@angular/common/http';
// import { PostService } from '../post.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})
export class UsersComponent implements OnInit {
  
  IDuser: Object;
  deleteStatus: boolean = false;
  deleteStatusFail: boolean = false;
  openModal: boolean = false;
  filterTerm: string;
  closeResult: string;
  msg: string;

  submitted: boolean = false;
  userForm: FormGroup;
  editProfileForm: FormGroup;


  
  public get allUser(): Observable<User[]> {  
    return this._allUser;  
  }  
  public set allUser(value: Observable<User[]>) {  
    this._allUser = value;  
  }  
  private _allUser: Observable<User[]>;  

  constructor(private data: UserDataService, private modalService: NgbModal, private formBuilder: FormBuilder, private http: HttpClient, )  {
    this.userForm = this.formBuilder.group({
      userName: ['', Validators.required ], 
      department: ['', Validators.required ],
      role: ['', Validators.required ],
      city: ['', Validators.required ],
    });

    this.editProfileForm = this.formBuilder.group({
      id: [''],
      userName: [''],
      department: [''],
      role: [''],
      city: ['']
     });
   }

   onSubmit(userForm: FormGroup){
     this.submitted = true;
     console.log(userForm);
      return this.http.post('http://localhost/Laravel-Angular11-CRUD/public/createUser', userForm
      ).subscribe(response=>{
        this.deleteStatus= true;
        this.msg = "New User Added Successfully!";
        this.ngOnInit();
      });  
   }

  closeAlert(){
    this.deleteStatus= false;
    this.openModal= false;
    this.ngOnInit();
  }
  
  open(content, user: FormGroup) {
    this.deleteStatus= false;
    this.modalService.open(content, {
      ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
    this.editProfileForm.patchValue({
      id: user['id'],
      userName: user['userName'],
      department: user['department'],
      role: user['role'],
      city: user['city']
     });
  }

  editForm(editProfileForm: FormGroup){
    console.log(editProfileForm);
    return this.http.post('http://localhost/Laravel-Angular11-CRUD/public/editUser', editProfileForm
    ).subscribe(response =>{
      this.deleteStatus= true;
      this.msg = "User Edited Added Successfully!";
      this.ngOnInit();
    });  
  }
   
  getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return  `with: ${reason}`;
    }
  }

  ngOnInit(): void {
      this.allUser = this.data.getUsers();  
      console.log(this.allUser); 
  }

  deleteClick(id) {
    this.data.deleteUser(id).subscribe( response => {
      if(response['status']){
        // alert(response['data']); 
        this.deleteStatus= true;
        this.msg = "user with ID "+id+" deleted successfully!";
        this.ngOnInit();
      }else{
        // alert(response['data']); 
        this.deleteStatusFail= true;
        this.ngOnInit();
      }
    })
  }
}
