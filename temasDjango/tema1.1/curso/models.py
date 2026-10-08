from django.conf import settings
from django.db import models
from django.utils import timezone

# Create your models here.
class Alumno(models.Model):
    nombre = models.CharField(max_length=100)
    edad = models.PositiveIntegerField()

    def __str__(self):
        return self.nombre


class Profesor(models.Model):
    nombre = models.CharField(max_length=100)
    edad = models.PositiveIntegerField()
    estudios = models.CharField(max_length=200)

    def __str__(self):
        return self.nombre


class TipoCurso(models.Model):
    nombre = models.CharField(max_length=100)
    horas = models.PositiveIntegerField()
    dias = models.CharField(max_length=100)

    def __str__(self):
        return self.nombre