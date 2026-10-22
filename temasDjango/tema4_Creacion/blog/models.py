from django.db import models
from django.conf import settings
from django.utils import timezone

# Create your models here.
 
class Usuario(models.Model):
    nombre = models.CharField(max_length=100)
    correo_electronico = models.EmailField(max_length=254, unique=True)
    contrasena = models.CharField(max_length=128)
    fecha_registro = models.DateTimeField(default=timezone.now)
    def __str__(self):
        return self.nombre

class AsignacionTarea(models.Model):
    usuario = models.ForeignKey(Usuario, on_delete=models.CASCADE)
    tarea = models.ForeignKey('Tarea', on_delete=models.CASCADE)
    observaciones = models.TextField()
    fecha_asignacion = models.DateTimeField(default=timezone.now)
    
class Proyecto(models.Model):
    nombre = models.CharField(max_length=100)
    descripcion = models.TextField()
    duracion_estimada = models.FloatField()
    fecha_inicio = models.DateField()
    fecha_finalizacion = models.DateField()
    creador = models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name="proyectos_creados")
    proyectos_asignados = models.ManyToManyField(Usuario, related_name="proyectos_asignados")
    
    def __str__(self):
        return self.nombre
    
class Tarea(models.Model):
    ESTADOS = [
        ('Pendiente', 'Pendiente'),
        ('Progreso', 'Progreso'),
        ('Completada', 'Completada'),
    ]
 
    titulo = models.CharField(max_length=200)
    descripcion = models.TextField()
    prioridad = models.IntegerField()
    estado = models.CharField(max_length=10, choices=ESTADOS, default='Pendiente')
    completada = models.BooleanField(default=False)
    fecha_creacion = models.DateField(default=timezone.now)
    hora_vencimiento = models.TimeField()
    creador = models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name="tareas_creadas")
    usuarios_asignados = models.ManyToManyField(Usuario, through="AsignacionTarea", related_name="tareas_asignadas")
    proyecto = models.ForeignKey(Proyecto, on_delete = models.CASCADE)
 
    def __str__(self):
        return self.titulo

class Etiqueta(models.Model):
    nombre = models.CharField(max_length=50, unique=True)
    etiquetas_asociadas = models.ManyToManyField(Tarea)
 
    def __str__(self):
        return self.nombre

class Comentario(models.Model):
    contenido = models.TextField()
    fecha_comentario = models.DateTimeField(default=timezone.now)
    autor = models.OneToOneField(Usuario, on_delete= models.CASCADE)
    comentario = models.OneToOneField(Tarea, on_delete= models.CASCADE)
    def __str__(self):
        return self.contenido[:50]