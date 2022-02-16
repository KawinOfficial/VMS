const app = Vue.createApp({
  data() {
    return {
      url_page: "/venderCOVID/API/request-history.php",

      information: [],
      modalInfo: [],
      timeline: [],
      question: [],
      vaccine: 2,
      doseDate: [],
      vaccineDose: [],

      form: {
        page: false,
        search: "",
        datetime: "",
      },

      optionQuestion: [
        {
          text: "มีการใกล้ชิดหรือสัมผัสกับบุคคลที่มีความเสี่ยงโรค COVID-19",
          textEng:
            "(Have you been in physical contact with suspected COVID-19 patients?)",
        },
        {
          text: "มีประวัติการเดินทางไปในสถานที่ วันและเวลาเดียวกันกับผู้ติดเชื้อ COVID-19",
          textEng: "(Have you traveled from any area with COVID-19 outbreak?)",
        },
        {
          text: "มีไข้หรืออุณหภูมิร่างกายมากกว่า 37.1 องศา",
          textEng: "( Do you have a fever more than 37.1 ํC ?)",
        },
        {
          text: "มีอาการไอหรือเจ็บคอ",
          textEng: "(Do you have a cough or sore throats?)",
        },
        {
          text: "มีน้ำมูกหรือเสมหะ",
          textEng: "(Do you have a runny nose?)",
        },
        {
          text: "ไม่ได้กลิ่นหรือไม่รับรส",
          textEng: "(Do you lose taste or smell ?)",
        },
        { text: "ปวดกล้ามเนื้อ", textEng: "(Do you have muscle aches?)" },
        {
          text: "หายใจเหนื่อยหรือหายใจลำบาก",
          textEng: "(Do you have a shortness of breath?)",
        },
      ],
    };
  },
  methods: {
    getVaccine() {
      const {
        doseDate1,
        doseDate2,
        doseDate3,
        doseDate4,
        doseDate5,
        vaccineDose1,
        vaccineDose2,
        vaccineDose3,
        vaccineDose4,
        vaccineDose5,
      } = this.modalInfo;
      this.doseDate.push(doseDate1);
      this.doseDate.push(doseDate2);
      this.doseDate.push(doseDate3);
      this.doseDate.push(doseDate4);
      this.doseDate.push(doseDate5);

      this.vaccineDose.push(vaccineDose1);
      this.vaccineDose.push(vaccineDose2);
      this.vaccineDose.push(vaccineDose3);
      this.vaccineDose.push(vaccineDose4);
      this.vaccineDose.push(vaccineDose5);
    },

    getInfo() {
      axios.post(this.url_page, this.form).then(({ data }) => {
        this.information = data.reverse();
      });
    },

    handleModal(info) {
      this.doseDate = [];
      this.vaccineDose = [];

      this.modalInfo = info;
      this.timeline = JSON.parse(this.modalInfo.timeline);
      this.question = JSON.parse(this.modalInfo.question);
      this.vaccine = parseInt(this.modalInfo.vaccine);
      this.getVaccine();
    },
  },
  mounted() {
    setTimeout(this.getInfo, 0);
  },
});

app.mount("#history");
