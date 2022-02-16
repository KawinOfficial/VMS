const app = Vue.createApp({
  data() {
    return {
      url_page: "/venderCOVID/API/request-history.php",
      url_approve: "/venderCOVID/API/approve.php",

      information: [],
      modalInfo: [],
      timeline: [],
      question: [false, false, false, false, false, false],
      status: "",
      vaccine: 2,
      doseDate: [],
      vaccineDose: [],

      form: {
        page: true,
        search: "",
        datetime: "",
      },

      infoCancel: {},

      note: "",

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
    getInfo() {
      axios
        .post(this.url_page, this.form)
        .then(({ data }) => (this.information = data));
    },

    getTable() {
      // Array Unique
      // [...< variable >] = copy of < variable >
      let info = [
        ...new Map(
          [...this.information].reverse().map((data) => [data.number, data])
        ).values(),
      ];
      return info.reverse();
    },

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
      } = this.modalInfo[0];
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

    getModal(number) {
      this.doseDate = [];
      this.vaccineDose = [];
      this.modalInfo = this.information.filter((data) => data.number == number);
      this.timeline = this.modalInfo.map((data) => JSON.parse(data.timeline));
      this.question = this.modalInfo.map((data) => JSON.parse(data.question));
      this.status = this.question
        .map((data) => data.find((info) => info === "true"))
        .find((info) => info === "true");

      // console.log(this.modalInfo);

      this.vaccine = parseInt(this.modalInfo[0].vaccine);
      this.getVaccine();
    },

    handleConfirm(info) {
      const result = {
        number: info.number,
        name: info.name,
        company: info.company,
        toVisit: info.toVisit,
        visitDate: info.visitDate,
        status: "approve",
        note: this.note,
      };

      axios.post(this.url_approve, result).then(({ data: { state } }) => {
        if (state) {
          Swal.fire({
            icon: "success",
            title: "ยืนยันคำขอสำเร็จ (Request comfirmed)",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => this.getInfo());
        } else {
          Swal.fire({
            icon: "success",
            title: "ยืนยันคำขอไม่สำเร็จ (Error)",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    },

    handleCancel() {
      console.log(this.infoCancel);
      const { number, name, company, toVisit, visitDate } = this.infoCancel;
      const result = {
        number: number,
        name: name,
        company: company,
        toVisit: toVisit,
        visitDate: visitDate,
        status: "disapproved",
        note: this.note,
      };

      axios.post(this.url_approve, result).then(({ data: { state } }) => {
        if (state) {
          Swal.fire({
            icon: "warning",
            title: "ยกเลิกสำเร็จ",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            this.note = "";
            this.getInfo();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "ยกเลิกไม่สำเร็จ",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    },
  },
  mounted() {
    // setInterval(this.getInfo, 5000);
    setTimeout(this.getInfo, 100);
  },
});

app.mount("#request");
