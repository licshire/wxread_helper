#coding: utf-8
from __future__ import absolute_import

from celery import shared_task
from readhelper import celery_app
from .utils import get_free_books, get_special_books
from .models import Subscribe, Bookinfo, Prices
from django.contrib.auth.models import User
from django.core.mail import send_mail

@celery_app.task
def send_email():
    books = get_free_books()
    for book in books:
        print book['bid']
        subinfo = Subscribe.objects.filter(bid=book['bid'])
        if(subinfo):
            [send_mail(u'你订阅的书籍<<%s>>免费啦' % book['title'], u'书籍简介: %s \n来自微信读书小助手 from no13bus' % book['introduction'], 'linchen@51huxin.com',
                  [suser.user.email], fail_silently=False) for suser in subinfo]
