<?php
// Connection DataBase
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbnm", $user, $pass);
    $conn->exec('set names utf8');
} catch (PDOException $e) {
    echo "Error in connection DB: " . $e->getMessage();
}
/* Functions CRUD */
// Register Users
function regUser($fullname, $email, $username, $password, $conn)
{
    try {
        $sql  = "INSERT INTO usuario (nombre, correo, telefono, contrasena) 
                     VALUES (:fullname, :email, :username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":fullname", $fullname);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// Login Users
function login($username, $password, $conn)
{
    try {
        $sql  = "SELECT * FROM usuario 
                 WHERE correo = :username 
                 AND contrasena = :password
                 LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['ss-id'] = $data['id_usuario'];
            $_SESSION['ss-fullname'] = $data['nombre'];
            $_SESSION['ss-rol']    = $data['id_rol'];
            return true;
        } else {
            $_SESSION['error'] = '¡Correo y/o contraseña son incorrectos!';
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// Register Users
function addUser($fullname, $email, $username, $password, $conn)
{
    try {
        $sql  = "INSERT INTO usuario (nombre, correo, telefono, contrasena) 
                     VALUES (:fullname, :email, :username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":fullname", $fullname);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// List All Users
function listUsers($conn)
{
    try {
        $sql  = "SELECT * FROM usuario";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Show User
function showUser($id, $conn)
{
    try {
        $sql  = "SELECT * FROM usuario WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Edit User
function editUser($id, $id_rol, $fullname, $email, $username, $password, $conn)
{
    try {
        $sql  = "UPDATE usuario SET id_rol = :id_rol, nombre = :fullname, correo = :email, telefono = :username, contrasena = :password WHERE id_usuario = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->bindparam(":fullname", $fullname);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Delete User
function deleteUser($id, $conn)
{
    try {
        $sql  = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// CATEGORIES + + + + + + + + + + + + + + +
// - - - - - - - - - - - - - - - - - - - -

// List All Categories
function listCategories($conn)
{
    try {
        $sql  = "SELECT * FROM categories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Add Category
function addCategory($name, $image, $description, $conn)
{
    try {
        $sql  = "INSERT INTO categories (name, image, description) 
                     VALUES (:name, :image, :description)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":image", $image);
        $stmt->bindparam(":description", $description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Show Category
function showCategory($id, $conn)
{
    try {
        $sql  = "SELECT * FROM categories WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Edit Category
function editCategory($id, $name, $image, $description, $conn)
{
    try {
        if ($image == null) {
            $sql  = "UPDATE categories SET name = :name, description = :description 
                     WHERE id = :id";
        } else {
            $sql  = "UPDATE categories SET name = :name, image = :image, description = :description 
                     WHERE id = :id";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":description", $description);
        if ($image != null) {
            $stmt->bindparam(":image", $image);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Delete Category
function deleteCategory($id, $conn)
{
    try {
        $sql  = "DELETE FROM categories WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// GAMES + + + + + + + + + + + + + + +
// - - - - - - - - - - - - - - - - - - - -


// List All Games
function listGames($conn)
{
    try {
        $sql  = "SELECT * FROM curso";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// Add Game
function addGame($name, $image, $description, $price, $user_id, $period, $conn)
{
    try {
        $sql  = "INSERT INTO curso (nombre, imagen, descripcion, precio, id_usuario, duracion) 
                     VALUES (:name, :image, :description, :price, :user_id, :period)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":image", $image);
        $stmt->bindparam(":description", $description);
        $stmt->bindparam(":price", $price);
        $stmt->bindparam(":user_id", $user_id);
        $stmt->bindparam(":period", $period);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// Show Game
function showGame($id, $conn)
{
    try {
        $sql  = "SELECT * FROM curso WHERE id_curso = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Edit Game
function editGame($id, $name, $description, $price, $user_id, $period, $image, $conn)
{
    try {
        if ($image == null) {
            $sql  = "UPDATE curso SET nombre = :name, descripcion = :description, precio = :price, id_usuario = :user_id, duracion = :period
                     WHERE id_curso = :id";
        } else {
            $sql  = "UPDATE curso SET nombre = :name, imagen = :image, descripcion = :description, precio = :price, id_usuario = :user_id, duracion = :period
                     WHERE id_curso = :id";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":description", $description);
        $stmt->bindparam(":price", $price);
        $stmt->bindparam(":user_id", $user_id);
        $stmt->bindparam(":period", $period);
        if ($image != null) {
            $stmt->bindparam(":image", $image);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Delete Game
function deleteGame($id, $conn)
{
    try {
        $sql  = "DELETE FROM curso WHERE id_curso = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// ----- Nuevo -----

//Add Bill

function addBill($id_usuario, $id_curso, $conn)
{
    try {
        $sql  = "INSERT INTO factura (id_usuario, id_curso, fecha) 
                     VALUES (:id_usuario, :id_curso, now())";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_usuario", $id_usuario);
        $stmt->bindparam(":id_curso", $id_curso);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Show Bill

function showBill($conn)
{
    try {
        $sql  = "SELECT MAX(id_factura) AS id FROM factura";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = (int)$data["id"];

        $sql  = "SELECT * FROM factura WHERE id_factura = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//List all bills

function listBills($conn)
{
    try {
        $sql  = "SELECT * FROM factura";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Show registered people in each course

function showRegPpl($id_curso, $conn)
{
    try {
        $sql = "SELECT * FROM factura WHERE id_curso = :id_curso";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_curso", $id_curso);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Show bought courses for one person

function boughtCourses($id_usuario, $conn)
{
    try {
        $sql = "SELECT * FROM factura WHERE id_usuario = :id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_usuario", $id_usuario);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Validate if person has already bought the course

function alreadyBought($id_usuario, $id_curso, $conn)
{
    try {
        $sql = "SELECT * FROM factura WHERE id_usuario = :id_usuario AND id_curso = :id_curso";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_usuario", $id_usuario);
        $stmt->bindparam(":id_curso", $id_curso);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Tabla rol

function showRol($id_rol, $conn)
{
    try {
        $sql = "SELECT * FROM rol WHERE id_rol = :id_rol";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function listRol($conn)
{
    try {
        $sql = "SELECT * FROM rol";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Add roles
function addRol($nombre, $conn)
{
    try {
        $sql  = "INSERT INTO rol (nombre) VALUES (:nombre)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":nombre", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Edit rol
function editRol($id_rol, $nombre, $conn)
{
    try {
        $sql  = "UPDATE rol SET nombre = :nombre WHERE id_rol = :id_rol";

        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->bindparam(":nombre", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Delete roles
function deleteRol($id, $conn)
{
    try {
        $sql  = "DELETE FROM rol WHERE id_rol = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



// PERMISO ROLES
//Añadir
function addPermisosRoles($id_permiso, $conn)
{
    try {
        $sql  = "SELECT MAX(id_rol) AS id FROM rol";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_rol = (int)$data["id"];

        $sql  = "INSERT INTO rol_permiso (id_rol, id_permiso) VALUES (:id_rol, :id_permiso)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->bindparam(":id_permiso", $id_permiso);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//Editar add
function showPermisosRoles($id_rol, $conn)
{
    try {
        $sql = "SELECT id_permiso FROM rol_permiso WHERE id_rol = :id_rol";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function editAddPermisosRoles($id_rol, $id_permiso, $arrayPermisos, $conn)
{
    try {
        if (!in_array($id_permiso, $arrayPermisos)) {
            $sql  = "INSERT INTO rol_permiso (id_rol, id_permiso) VALUES (:id_rol, :id_permiso)";
            $stmt = $conn->prepare($sql);
            $stmt->bindparam(":id_rol", $id_rol);
            $stmt->bindparam(":id_permiso", $id_permiso);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//Editar delete
function editDeletePermisosRoles($id_rol, $id_permiso, $conn)
{
    try {
        $sql  = "DELETE FROM rol_permiso WHERE id_rol = :id_rol AND id_permiso = :id_permiso";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->bindparam(":id_permiso", $id_permiso);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Ver

function showRolPermiso($id_rol, $conn)
{
    try {
        $sql = "SELECT id_permiso FROM rol_permiso WHERE id_rol = :id_rol";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


// PERMISO

function showPermisos($conn)
{
    try {
        $sql = "SELECT * FROM permiso";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// VERIFICAR PERMISOS

function verificarPermisos($id_rol, $id_permiso, $conn){
    try {
        $sql = "SELECT * FROM rol_permiso WHERE id_rol = :id_rol AND id_permiso = :id_permiso";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id_rol", $id_rol);
        $stmt->bindparam(":id_permiso", $id_permiso);
        $stmt->execute();
        $consulta = $stmt->fetchAll();
        if(sizeof($consulta) != 0){
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

// MODULOS

function showModulo($id_modulo, $conn)
{
    try {
        $sql = "SELECT nombre FROM modulo WHERE id_modulo = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":id", $id_modulo);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
