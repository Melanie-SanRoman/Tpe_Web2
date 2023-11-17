# API de libros y autores
## Contenido
1. [Introduccion](#introduccion)
2. [Configuracion](#configuracion)
3. [Parametros a usar](#parametros-get)
4. [Implementacion de Endpoints para Libros](#implementacion-de-endpoints-para-libros)
5. [Implementacion de Endpoints para Autores](#implementacion-de-endpoints-para-autores)
6. [Colaboradores](#colaboradores)
***
## Introduccion
_API REST de Libros y Autores, es una plataforma diseñada para facilitar la gestión y recuperación de información relacionada con obras literarias y sus respectivos creadores. Esta API proporciona un conjunto de endpoints que permiten a los desarrolladores acceder de manera eficiente a datos cruciales sobre libros y autores._

**Objetivo Principal:**
_El propósito fundamental de esta API es brindar a los desarrolladores la capacidad de realizar operaciones fundamentales sobre libros y autores de manera sencilla y consistente. Desde la obtención de una lista completa de autores hasta la actualización de detalles específicos de un libro._

**Recursos Disponibles:**
_La API ofrece endpoints claramente definidos para trabajar con autores y libros de manera individual o combinada. Con la capacidad de realizar consultas, actualizaciones, creación y eliminación de registros, los desarrolladores pueden personalizar sus aplicaciones según las necesidades específicas de sus usuarios._

**Formato de Datos:**
_Todos los datos intercambiados con la API se encuentran en formato JSON._

**Documentación:**
_Para una implementación exitosa, proporcionamos una documentación completa que detalla cada endpoint, los parámetros esperados, y ejemplos de solicitudes y respuestas._
***
## Configuracion
>[!IMPORTANT]
>* [BBDD](/BBDD.sql): Importar base de datos

## Parametros GET
* **CAMPO**: {columna de la tabla}
* **ORDER**: ASC/DESC
* **MIN**: 
    * en caso de libros: año minimo de lanzamiento
    * en caso de autores: año minimo de nacimiento
* **MAX**:
    * en caso de libros: año maximo de lanzamiento
    * en caso de autores: año maximo de nacimiento
* **LIMITE**: Cantidad de datos a mostras
* **PAGINA**: A partir de que numero de dato mostrar
***

## Implementacion de Endpoints para Libros

### 1. Obtener lista de libros con su autor

**Endpoint:** `.../api/libros`

**Método:** `GET`

**Uso:** `http://.../api/libros`

***
### 2. Obtener un libro por su ID

**Endpoint:** `.../api/libros/:ID`

**Método:** `GET`

**Uso:** `http://.../api/libros/4`

**Ejemplo de respuesta (JSON):**

```json
{
    "id_libros": 4,
    "Nombre": "La Reina Batata",
    "Genero": "Cuento infantil",
    "Lanzamiento": "1966",
    "id_autor": 3
}
```
***
### 3. Eliminar un libro por su ID

**Endpoint:** `.../api/libros/:ID`

**Método:** `DELETE`

**Uso:** `http://.../api/libros/14`

***
### 4. Agregar un nuevo libro

**Endpoint:** `.../api/libros`

**Método:** `POST`

**Uso:** `http://.../api/libros`

**Ejemplo de body (JSON):**

```json
{
    "Nombre": "Nombre",
    "Genero": "Genero",
    "Lanzamiento": "2023",
    "id_autor": 1
}
```
***
### 5. Actualizar un libro por su ID

**Endpoint:** `.../api/libros/:ID`

**Método:** `PUT`

**Uso:** `http://.../api/libros/13`

**Ejemplo de body (JSON):**

```json
{
    "id_libros": 13,
    "Nombre": "UpdateNombre",
    "Genero": "UpdateGenero",
    "Lanzamiento": "2023",
    "id_autor": 1
}
```
***
### 6. Listar todos los libros por un campo de manera ascendente o descendente

**Endpoint:** `.../api/libros/:CAMPO/:ORDER`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/libros/id_libros/ASC`

***
### 7. Filtrar todos los libros por su lanzamiento

**Endpoint:** `.../api/libros/filtrar/Lanzamiento/:MIN/:MAX`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/libros/filtrar/Lanzamiento/1990/2023`

***
### 8. Paginar todos los libros 

**Endpoint:** `.../api/libros/paginar/:LIMITE/:PAGINA`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/libros/paginar/2/2`

**Ejemplo de respuesta (JSON):**

***
## Implementacion de Endpoints para autores

### 1. Obtener lista de autores

**Endpoint:** `.../api/autores`

**Método:** `GET`

**Uso:** `http://.../api/autores`

**Ejemplo de respuesta (JSON):**

***
### 2. Obtener un autor por su ID

**Endpoint:** `.../api/autores/:ID`

**Método:** `GET`

**Uso:** `http://.../api/autores/4`

**Ejemplo de respuesta (JSON):**

```json
{
    "ID": 4,
    "Nombre_autor": "John",
    "Apellido": "Green",
    "Fecha_de_nacimiento": "1977-08-24",
    "Nacionalidad": "Estadounidense"
}
```
***
### 3. Eliminar un autor por su ID

**Endpoint:** `.../api/autores/:ID`

**Método:** `DELETE`

**Uso:** `http://.../api/autores/6`

***
### 4. Agregar un nuevo autor

**Endpoint:** `.../api/autores`

**Método:** `POST`

**Uso:** `http://.../api/autores`

**Ejemplo de body (JSON):**

```json
{
    "Nombre_autor": "NuevoNombre",
    "Apellido": "NuevoApellido",
    "Fecha_de_nacimiento": "0000-00-00",
    "Nacionalidad": "NuevaNacionalidad"
}
```
***
### 5. Actualizar un autor por su ID

**Endpoint:** `.../api/autores/:ID`

**Método:** `PUT`

**Uso:** `http://.../api/autores/7`

**Ejemplo de body (JSON):**

```json
{
    "ID": 7,
    "Nombre_autor": "UpdateNombre",
    "Apellido": "UpdateApellido",
    "Fecha_de_nacimiento": "0000-00-00",
    "Nacionalidad": "UpdateNacionalidad"
}
```
***
### 6. Listar todos los autores por un campo de manera ascendente o descendente

**Endpoint:** `.../api/autores/:CAMPO/:ORDER`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/autores/ID/ASC`

***
### 7. Filtrar todos los autores por su nacimiento

**Endpoint:** `.../api/autores/filtrar/nacimiento/:MIN/:MAX`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/autores/filtrar/nacimiento/19501212/20230101`

***
### 8. Paginar todos los autores 

**Endpoint:** `.../api/autores/paginar/:LIMITE/:PAGINA`

**Método:** `GET`

**Uso de ejemplo:** `http://.../api/autores/paginar/2/2`

***
## Colaboradores

> * Melanie San Roman
> * Micaela Nicole Lopez
