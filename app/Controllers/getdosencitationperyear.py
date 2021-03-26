import sys
from bs4 import BeautifulSoup as soup
import urllib.request as urlib
s = soup(str(urlib.urlopen('https://scholar.google.com/citations?user=' + sys.argv[1]).read()), 'lxml')
years = map(int, [i.text for i in s.find_all('span', {'class': 'gsc_g_t'})])
citation_number = map(int, [i.text for i in s.find_all('span', {'class': 'gsc_g_al'})])
final_chart_data = dict(zip(years, citation_number))
list_data_citation_dosen = list(final_chart_data.items())
print(list_data_citation_dosen)