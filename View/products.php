<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Libros</h1>
        <p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearLibroModal"><i class="fas fa-tasks"></i> Agregar Libros</button>
        </p>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Año de publicación</th>
                    <th>Genero</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $productos): ?>
                <tr>
                    <td><?php echo $productos['id']; ?></td>
                    <td><?php echo $productos['titulo']; ?></td>
                    <td><?php echo $productos['autor']; ?></td>
                    <td><?php echo $productos['anio_publicacion']; ?></td>
                    <td><?php echo $productos['genero']; ?></td>
                    <td>

                    <button type="button" class="btn btn-warning" 
                    data-toggle="modal"
                    data-target="#editarLibroModal"
                    data-id="<?php echo $productos['id']; ?>"
                    data-titulo="<?php echo $productos['titulo']; ?>"
                    data-autor="<?php echo $productos['autor']; ?>"   
                    data-anio="<?php echo $productos['anio_publicacion']; ?>"
                    data-genero="<?php echo $productos['genero']; ?>">                
                    <i class="fas fa-edit"></i> 
                        Editar
                    </button>

                    <button type="button" class="btn btn-danger" 
                    data-toggle="modal"
                    data-target="#eliminarProductoModal"
                    data-id="<?php echo $productos['id']; ?>">                 
                    <i class="fas fa-trash"></i> 
                        Eliminar
                    </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

        <!-- MODAL AGREGAR -->
    <div class="modal fade" id="crearLibroModal" tabindex="-1">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Agregar Libros</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <form id="crearLibroForm">
                <div class="form-group">
                    <label for="txt_titulo">Nombre del Libro</label>
                    <input type="text" class="form-control" placeholder="Nombre del libro" id="txt_titulo" name="txt_titulo" required>
                </div>

                <div class="form-group">
                    <label for="txt_autor">Nombre del Autor</label>
                    <input type="text" class="form-control" placeholder="Nombre del autor" id="txt_autor" name="txt_autor" required>
                </div>

                <div class="form-group">
                    <label for="txt_anio_publicacion">Año de publicación:</label>
                    <input type="date" class="form-control" placeholder="Año de publicación" id="txt_anio_publicacion" name="txt_anio_publicacion" required>
                </div>

                <div class="form-group">
                    <label for="txt_genero">Genero</label>
                    <input type="text" class="form-control" placeholder="Genero" id="txt_genero" name="txt_genero" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>

    <!-- MODAL EDITAR PRODUCTOS -->
    <div class="modal fade" id="editarLibroModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Editar Libros</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                <form id="editarLibroForm">

                    <div class="form-group">
                        <input type="hidden" id="editLibroId" name="id">
                        <label for="txt_edittitulo">Titulo del Libro</label>
                        <input type="text" class="form-control" placeholder="Titulo del libro" id="edittitulo" name="txt_edittitulo" required>
                    </div>

                    <div class="form-group">
                        <label for="txt_editautor">Nombre del Autor</label>
                        <input type="text" class="form-control" placeholder="Nombre del autor" id="editautor" name="txt_editautor" required>
                    </div>

                    <div class="form-group">
                        <label for="txt_editanio_publicacion">Año de publicación:</label>
                        <input type="date" class="form-control" placeholder="Año de publicación" id="editanio_publicacion" name="txt_editanio_publicacion" required>
                    </div>

                    <div class="form-group">
                        <label for="txt_editgenero">Genero</label>
                        <input type="text" class="form-control" placeholder="Genero" id="editgenero" name="txt_editgenero" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>
   
    <!-- MODAL ELIMINAR PRODUCTOS -->
    <div class="modal fade" id="eliminarProductoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    
                <!-- Modal body -->
                <form id="eliminarProductoForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="eliminarProductoId">
                        <p>¿Estas seguro que deseas eliminar el producto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  
    <!-- manejar js para insertar los datos -->
    <script>
        document.addEventListener('DOMContentLoaded',function(){
                $(document).on('show.bs.modal','#editarLibroModal',function (event){
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const titulo = button.getAttribute('data-titulo');
                const autor = button.getAttribute('data-autor');
                const anio = button.getAttribute('data-anio');
                const genero = button.getAttribute('data-genero');
                document.getElementById('editLibroId').value = id;
                document.getElementById('edittitulo').value = titulo;
                document.getElementById('editautor').value = autor;
                document.getElementById('editanio_publicacion').value = anio;
                document.getElementById('editgenero').value = genero;
                });


            //ELIMINAR
            $(document).on('show.bs.modal','#eliminarProductoModal',function (event){
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            document.getElementById('eliminarProductoId').value = id;
            });
            
            

            //EDITAR
            document.getElementById('editarLibroForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=editar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#editarLibroModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Editar el Producto");
                    }
                });

            });

            //Eliminar
            document.getElementById('eliminarProductoForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=eliminar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#eliminarLibroModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Eliminar el Producto");
                    }
                });
            });

            //CREAR
            document.getElementById('crearLibroForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=crear',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        location.reload();
                    }else{
                        alert("Error al crear el producto");
                    }
                });

            });
        });

    </script>


</body>
</html>
