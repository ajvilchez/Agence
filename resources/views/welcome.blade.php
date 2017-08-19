@extends('layouts.app')

    @section('content')

    <div id="mainContent" class="container">
        

        <div class="card">
        
            <div class="card-header c_title lighten-1 white-text">
              
                <h2>Análisis de desenpeño</h2>

                <h4>Por consultor:</h4>
    
            </div>
        
            <div class="card-body">
        
                <form action="" method="get" accept-charset="utf-8">

                    <div class="row">

                        <div class="col-1"></div>

                        <div class="col">
                           
                            <h4>Periodo:</h4>

                            <div id="periodo" class="form-group">
                            
                                <div class="row">    
                                    
                                    <div class="col-1"></div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        
                                        <div class="row">
                                            
                                            <div class="col">
                                                
                                                <label for="desde">Desde:</label>
                                            
                                            </div>
                                        
                                        </div>
                                        
                                        <div id="desde" class="row">
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="mes-desde">
                                                  
                                                  <option value="">Mes</option>
                                                
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="año-desde">
                                                  
                                                  <option value="">Año</option>
                                                
                                                </select>

                                            </div>

                                        </div>       

                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        
                                        <div class="row">
                                            
                                            <div class="col">
                                                
                                                <label for="desde">Hasta:</label>
                                            
                                            </div>
                                        
                                        </div>
                                        
                                        <div id="hasta" class="row">
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="mes-hasta">
                                                  
                                                  <option value="">Mes</option>
                                                
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="año-hasta">
                                                  
                                                  <option value="">Año</option>
                                                
                                                </select>

                                            </div>

                                        </div>       

                                    </div>

                            </div>

                            <h4>Consultores:</h4>

                            <div id="consultores" class="form-group">
                                
                                <div class="row">

                                    <div class="col-lg-1"></div>
                                    
                                    <div class="col-lg-3">
                                        
                                        <select multiple class="form-control ct-select" id="listaconsult">
                                        
                                          <option>1</option>
                                        
                                          <option>2</option>
                                        
                                          <option>3</option>
                                        
                                          <option>4</option>
                                        
                                          <option>5</option>
                                        
                                        </select>

                                    </div>
                                    
                                    <div class="col-lg-2 align-self-center ">
                                        
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                
                                                <button type="button" class="btn ct-btn form-control">Agregar</button>
                                            
                                            </div>

                                            <div class="col-12">
                                                
                                                <button type="button" class="btn ct-btn form-control">Quitar</button>
                                            
                                            </div>
                                                                          
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-3">
                                    
                                        <select multiple class="form-control ct-select" id="listaselec">
                                    
                                          <option>1</option>
                                    
                                          <option>2</option>
                                    
                                          <option>3</option>
                                    
                                          <option>4</option>
                                    
                                          <option>5</option>
                                    
                                        </select>                                
                                    
                                    </div>
                                    
                                </div>

                            </div>

                            <h4>Reportes:</h4>

                            <div id="reportes" class="form-group">
                            
                                <div class="row">    
                                    
                                    <div class="col-1"></div>
                                    
                                    <div class="col-lg-2">
                                        
                                        <button type="button" class="btn ct-btn form-control">Relatório</button>
                                         
                                    </div>

                                    <div class="col-lg-2">
                                        
                                        <button type="button" class="btn ct-btn form-control">Gráfico</button>
                                         
                                    </div>

                                    <div class="col-lg-2">
                                        
                                        <button type="button" class="btn ct-btn form-control">Pizza</button>
                                         
                                    </div>

                            </div>

                        </div>

                    </div>
                
                </form>
            
            </div>
        
        </div>


    </div>

    @stop
    
    @section('scripts')

    @stop