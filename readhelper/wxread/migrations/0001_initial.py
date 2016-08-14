# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.conf import settings


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='Bookinfo',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('title', models.CharField(max_length=100, verbose_name=b'\xe4\xb9\xa6\xe5\x90\x8d')),
                ('author', models.CharField(max_length=100, verbose_name=b'\xe4\xbd\x9c\xe8\x80\x85')),
                ('cover', models.CharField(max_length=200, verbose_name=b'\xe5\xb0\x81\xe9\x9d\xa2url')),
                ('price', models.IntegerField(max_length=10, verbose_name=b'\xe4\xbb\xb7\xe6\xa0\xbc')),
                ('introduction', models.CharField(max_length=200, verbose_name=b'\xe7\xae\x80\xe4\xbb\x8b')),
                ('bid', models.IntegerField(max_length=10)),
                ('create_time', models.DateTimeField(default=datetime.datetime(2016, 8, 14, 8, 8, 44, 170927), verbose_name=b'\xe5\x88\x9b\xe5\xbb\xba\xe6\x97\xb6\xe9\x97\xb4')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Prices',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('bid', models.IntegerField(max_length=10, verbose_name=b'\xe4\xb9\xa6id')),
                ('price', models.IntegerField(max_length=10, verbose_name=b'\xe5\x8e\x86\xe5\x8f\xb2\xe4\xbb\xb7\xe6\xa0\xbc')),
                ('create_time', models.DateTimeField(default=datetime.datetime(2016, 8, 14, 8, 8, 44, 171674), verbose_name=b'\xe5\x88\x9b\xe5\xbb\xba\xe6\x97\xb6\xe9\x97\xb4')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Subscribe',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('bid', models.IntegerField(max_length=10, verbose_name=b'\xe4\xb9\xa6id')),
                ('create_time', models.DateTimeField(default=datetime.datetime(2016, 8, 14, 8, 8, 44, 169671), verbose_name=b'\xe5\x88\x9b\xe5\xbb\xba\xe6\x97\xb6\xe9\x97\xb4')),
                ('user', models.ForeignKey(to=settings.AUTH_USER_MODEL)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
