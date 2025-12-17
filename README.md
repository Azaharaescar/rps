# ProyectoExamenes - Piedra, Papel o Tijeras
## Rock, Paper, Scissors Game

Este es un juego web de Piedra, Papel o Tijeras desarrollado en PHP con autenticación de usuario.

## 📋 Características

- Sistema de login con contraseña encriptada
- Juego interactivo de Piedra, Papel o Tijeras contra la computadora
- Imágenes visuales para cada jugada
- Modo de prueba para verificar todas las combinaciones posibles
- Gestión de sesiones de usuario
- Interfaz en español con Bootstrap

## 🚀 Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/Azaharaescar/rps.git
   ```

2. Configura un servidor web con PHP (Apache, Nginx, o usa PHP built-in server):
   ```bash
   php -S localhost:8000
   ```

3. Accede a la aplicación en tu navegador:
   ```
   http://localhost:8000
   ```

## 🎮 Uso

1. Accede a `index.php` para ver la página principal
2. Haz clic en "Inicia sesión"
3. Ingresa un nombre de usuario y la contraseña: **meow123**
4. Juega seleccionando Piedra, Papel o Tijeras
5. Cierra sesión cuando termines

## 📁 Estructura del Proyecto

```
rps/
├── index.php              # Página principal
├── login.php              # Sistema de autenticación
├── game.php               # Lógica del juego
├── bootstrap.php          # Estilos Bootstrap
├── starter-template.css   # Estilos personalizados
├── 0.png                  # Imagen: Piedra
├── 1.png                  # Imagen: Papel
├── 2.png                  # Imagen: Tijeras
└── README.md              # Este archivo
```

## 🔒 Seguridad

- La contraseña está hasheada con MD5 y salt
- Protección de sesiones para evitar acceso no autorizado
- Sanitización de salida con htmlentities()

## 📝 Notas

- Contraseña por defecto: `meow123`
- Salt utilizado: `XyZzy12*_`
- Hash almacenado: `a8609e8d62c043243c4e201cbb342862`

## 🌐 Referencias

- Basado en el curso WA4E (Web Applications for Everybody)
- Versión de referencia: http://www.wa4e.com/solutions/rps/



