const wyswietlacz = {
  data() {
    return {
      liczbaDoWyswietlenia: '',
      adresWyswietlaczaLcd: "/wyswietlacz/wyswietlLiczbe/",
      pelnyAdresWyswietlaczaLcd: ''
    }
  },
  computed: {
  },
  created() {
  },
  methods: {
    // Wyświetla liczbę na ekranie LCD
    wyswietlLiczbe() {
      this.pelnyAdresWyswietlaczaLcd = this.adresWyswietlaczaLcd + this.liczbaDoWyswietlenia;
    },

  }
}

Vue.createApp(wyswietlacz).mount('#wyswietlacz');