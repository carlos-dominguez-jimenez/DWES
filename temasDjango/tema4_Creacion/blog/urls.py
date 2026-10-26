from django.urls import path, re_path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('proyectos/listar/', views.listar_proyectos, name='listar_proyectos'),
    path('proyecto/<int:id_proyecto>/tareas/', views.dame_tareas_proyecto, name='dame_tareas_proyecto'),
]