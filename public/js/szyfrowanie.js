const szyfrowanie = {
  data() {
    return {
      trwaSzyfrowanieWiadomosci: false,
      trwaOdszyfrowanieWiadomosci: false,
      wiadomoscDoZaszyfrowania: '',
      wiadomoscDoOdszyfrowania: '',
      odszyfrowanaWiadomosc: '',
      zaszyfrowanaWiadomosc: '',
      tekstKomunikatu: '',
    }
  },
  computed: {
    komunikatToastowy() {
      return this.$refs.komunikatToastowy;
    }
  },
  created() {
  },
  methods: {
    // Pokazuje komunikat toastowy (wyskakuje na dole z prawej strony)
    pokazKomunikat(komunikat) {
      this.tekstKomunikatu = komunikat;
      let komunikatToastowy = bootstrap.Toast.getOrCreateInstance(this.komunikatToastowy);
      komunikatToastowy.show();
    },
    // Szyfruje wiadomość
    async zaszyfrujWiadomosc() {

      let instancjaVue = this;
      this.trwaSzyfrowanieWiadomosci = true;
      let odpowiedzAxios = await axios({
        method: 'POST',
        url: '/szyfrowanie/zaszyfrujWiadomosc',
        data: {
          wiadomoscDoZaszyfrowania: instancjaVue.wiadomoscDoZaszyfrowania
        },
        timeout: 300000
      })
        .then((response) => {
          instancjaVue.zaszyfrowanaWiadomosc = response.data.zaszyfrowanaWiadomosc;
        })
        .catch(function (error) {
          instancjaVue.obsluzStandardowyBlad(error);
        })
        .then(function () {
          instancjaVue.trwaSzyfrowanieWiadomosci = false;
        });

    },
        // Odszyfrowuje wiadomość
        async odszyfrujWiadomosc() {

          let instancjaVue = this;
          this.trwaOdszyfrowanieWiadomosci = true;
          let odpowiedzAxios = await axios({
            method: 'POST',
            url: '/szyfrowanie/odszyfrujWiadomosc',
            data: {
              wiadomoscDoOdszyfrowania: instancjaVue.wiadomoscDoOdszyfrowania
            },
            timeout: 300000
          })
            .then((response) => {
              instancjaVue.odszyfrowanaWiadomosc = response.data.odszyfrowanaWiadomosc;
            })
            .catch(function (error) {
              instancjaVue.obsluzStandardowyBlad(error);
            })
            .then(function () {
              instancjaVue.trwaOdszyfrowanieWiadomosci = false;
            });
    
        },
    // Funkcja testowa
    test() {
      return true;
    },

    // Obsługiwanie standardowych błędów HTTP oraz naszych własnych
    obsluzStandardowyBlad(error) {
      let tekstKomunikatu = '';
      if (error.response) {
        let kodBledu = error.response.status;
        switch (kodBledu) {
          case 403:
            tekstKomunikatu = 'Brak uprawnień do wykonania czynności';
            break;
          case 404:
            tekstKomunikatu = 'Nie odnaleziono strony';
            break;
          case 419:
            tekstKomunikatu = 'Sesja wygasła';
            break;
          case 429:
            tekstKomunikatu = 'Przekroczono limit zapytań';
            break;
          case 500:
            tekstKomunikatu = 'Błąd serwera';
            break;
          case 502:
            tekstKomunikatu = 'Błąd serwera';
            break;
          case 503:
            tekstKomunikatu = 'Serwis jest niedostępny';
            break;
          case 504:
            tekstKomunikatu = 'Przekroczono czas odpowiedzi serwera';
            break;
          case 520:
          case 521:
            tekstKomunikatu = error.response.data.komunikat;
            break;
          default:
            tekstKomunikatu = 'Wystąpił nieoczekiwany błąd';
            console.log('Otrzymałem status inny niż 2xx', error.response.status);
            console.log('Dane', error.response.data);
            console.log('Nagłówki', error.response.headers)
            console.log('Konfiguracja', error.config);
        }

      } else if (error.request) {
        tekstKomunikatu = 'Brak odpowiedzi serwera';
        console.log('Nie otrzymałem odpowiedzi od serwera', error.request);
        console.log('Konfiguracja', error.config);
      } else {
        tekstKomunikatu = 'Wystąpił nieoczekiwany błąd';
        console.log('Nieoczekiwany błąd podczas przygotowywania żądania', error.message);
        console.log('Konfiguracja', error.config);
      }

      this.pokazKomunikat(tekstKomunikatu);
    }
  }
}

Vue.createApp(szyfrowanie).mount('#szyfrowanie');