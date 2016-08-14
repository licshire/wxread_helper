#coding: utf-8
import requests
from bs4 import BeautifulSoup

LIMIT_TIME_FREE_URL = 'http://weread.qq.com/wrpage/store/4'
NEW_BOOK_URL = 'http://weread.qq.com/wrpage/store/3'
SPECIAL_PRICE_URL = 'http://weread.qq.com/wrpage/store/9'
BOOK_DETAIL = 'http://weread.qq.com/wrpage/book/share/%s'

HOST_RECOMMAND_URL = 'http://weread.qq.com/wrpage/store/2'
SEARCH_URL = 'http://weread.qq.com/wrpage/search?keyword=%s'


def getbooks(url):
    r = requests.get(url)
    soup = BeautifulSoup(r.content, 'lxml')
    ul = soup.find("ul", class_="search_list js_list")
    lis = ul.find_all('li')
    result = []
    for li in lis:
        bookid = li.a.attrs['data-id']
        cover = li.a.find_all('div')[0].attrs['data-src']
        title = li.a.find_all('div')[1].find_all('div')[0].text.strip()
        author = li.a.find_all('div')[1].find_all('div')[1].text.strip()
        introduction = li.a.find_all('div')[1].p.text.strip()
        result.append({'bid':bookid, 'cover':cover, 'title':title, 'author':author, 'introduction':introduction})
        print u'bookid:%s, 封面地址:%s, 书名:%s, 作者:%s, 简介:%s' % (bookid, cover, title, author, introduction)
    return result

def get_free_books():
    return getbooks(LIMIT_TIME_FREE_URL)

def get_special_books():
    return getbooks(SPECIAL_PRICE_URL)

