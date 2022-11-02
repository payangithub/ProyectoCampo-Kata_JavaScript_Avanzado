import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
@Injectable({
  providedIn: 'root'
})
export class ServiciosService {

 constructor(private http: HttpClient) { }


  productosall(){
    var url = environment.apiService;
    return this.http.get(url).toPromise();
  }


  productoid(pid:number){
 var url =`${environment.apiService}/${pid}`;
    // return this.http.post(url,JSON.stringify(datajson)).toPromise();
    return this.http.get(url).toPromise();
  }
}
