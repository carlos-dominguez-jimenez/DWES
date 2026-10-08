from django.db import models
from django.conf import settings
from django.utils import timezone

class Animal(models.Model):

    Cuidador = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE)

    Nombre = models.CharField(max_length=100)
    
    Tipo = models.CharField(max_length=200)

    def __str__(self):

        return self.Nombre
    
class Protectora(models.Model):

    Nombre = models.CharField(max_length=200)

    Descripcion = models.TextField()

    Fecha_creacion = models.DateTimeField(default=timezone.now)

    def publish(self):

        self.Fecha_creacion = timezone.now()

        self.save()

    def __str__(self):

        return self.Nombre

class Colaborador(models.Model):

    Nombre = models.CharField(max_length=200)

    Cargo = models.CharField(max_length=200)

    Fecha_entrada_Protectora = models.DateTimeField(null=True)

    def __str__(self):

        return self.Nombre
