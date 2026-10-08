from django.urls import path
from . import views

urlpatterns = [
    path('alumnos/', views.lista_alumnos, name='lista_alumnos'),
    path('profesores/', views.lista_profesores, name='lista_profesores'),
    path('tipos-curso/', views.lista_tipos_curso, name='lista_tipos_curso'),
]