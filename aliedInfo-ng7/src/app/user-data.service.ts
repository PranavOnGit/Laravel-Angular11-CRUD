import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs'; 
import { User } from "../app/User";  


@Injectable({
  providedIn: 'root'
})
export class UserDataService {
  
  constructor(private http: HttpClient) { }
  
  getUsers():Observable<User[]>{
    return this.http.get<User[]>('http://localhost/Laravel-Angular11-CRUD/public/');
  }

  getUserById(id){
    return this.http.get('http://localhost/Laravel-Angular11-CRUD/public/getUserById/'+id);
  }

  deleteUser(id){
      return this.http.get('http://localhost/Laravel-Angular11-CRUD/public/deleteUser/'+id);
  }
}
