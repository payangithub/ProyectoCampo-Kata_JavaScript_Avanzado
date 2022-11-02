import { Component, Inject, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatTableDataSource } from '@angular/material/table';
import { ServiciosService } from '../service/servicios.service';

@Component({
  selector: 'app-productosagricolas',
  templateUrl: './productosagricolas.component.html',
  styleUrls: ['./productosagricolas.component.css']
})
export class ProductosagricolasComponent implements OnInit {
  listaimagen: any = [];
  public productos: any;
  public producto: any;
  public flVisible: any = false;
  constructor(private service: ServiciosService,public dialog: MatDialog) {}

  ngOnInit(): void {
    this.getProductosAll();
  }

  displayedColumns: string[] = ['position', 'ruta', 'name'];
  dataSource = new MatTableDataSource();

  applyFilter(event: Event) {
    
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();
    this.listaimagen = this.dataSource.filteredData
    
  }

  async getProductosAll() {
    this.productos = await this.service.productosall();

    this.dataSource =new MatTableDataSource(this.productos['data']);
    this.listaimagen = this.productos['data'];

    // return this.productos;
  }

  openDialog(pid:number) {
    // this.dialog.open(DialogElement);
    const dialogRef = this.dialog.open(DialogElement, {
      
      data: {name: '', id: pid},
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
     // this.animal = result;
    });
  }

}

@Component({
  selector: 'modal',
  templateUrl: 'modal.component.html',
})
export class DialogElement implements OnInit{

constructor(  public dialogRef: MatDialogRef<DialogElement>,private service: ServiciosService,
    @Inject(MAT_DIALOG_DATA) public data: DialogData){}

listaimagen:any=[];
  ngOnInit(): void {
console.log(this.data);

    this.productosid()
  }

  async productosid(){
    var response = await this.service.productoid(this.data.id);
    console.log(response);    
    this.listaimagen = response;
  }

}


export interface DialogData {
  id: number;
  name: string;
}