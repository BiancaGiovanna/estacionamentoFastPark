function switch_page(obj) {

    document.getElementById('entranceVacancies').style.display="none";
    document.getElementById('exit').style.display="none";
    document.getElementById('waveControlPage').style.display="none";
    document.getElementById('tableControl').style.display="none";
    document.getElementById('priceControler').style.display="none";
    document.getElementById('report').style.display="none";


  switch (obj.id) {
     case 'tab_entrance':
     document.getElementById('entranceVacancies').style.display="block";
     break
     case 'tab_exit':
     document.getElementById('exit').style.display="block";
     break
     case 'tab_vacancies':
     document.getElementById('waveControlPage').style.display="block";
     break
     case 'tab_client':
     document.getElementById('tableControl').style.display="block";
     break
     case 'tab_price':
     document.getElementById('priceControler').style.display="block";
     break
     case 'tab_report':
     document.getElementById('report').style.display="block";
     break
     
  }
}
