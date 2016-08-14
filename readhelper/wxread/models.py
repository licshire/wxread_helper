#coding: utf-8
from django.db import models
import datetime
from django.contrib.auth.models import User

# Create your models here.

class Subscribe(models.Model):
    user = models.ForeignKey(User)
    bid = models.IntegerField('书id', max_length=10)
    create_time = models.DateTimeField('创建时间', default=datetime.datetime.now())

class Bookinfo(models.Model):
    title = models.CharField('书名', max_length=100)
    author = models.CharField('作者', max_length=100)
    cover = models.CharField('封面url', max_length=200)
    price = models.IntegerField('价格', max_length=10)
    introduction = models.CharField('简介', max_length=200)
    bid = models.IntegerField(max_length=10)
    create_time = models.DateTimeField('创建时间', default=datetime.datetime.now())

class Prices(models.Model):
    bid = models.IntegerField('书id', max_length=10)
    price = models.IntegerField('历史价格', max_length=10)
    create_time = models.DateTimeField('创建时间', default=datetime.datetime.now())