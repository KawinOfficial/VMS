const app = Vue.createApp({
  data() {
    return {
      url_page: "/venderCOVID/API/request-history.php",
      url_approve: "/venderCOVID/API/approve.php",
      // url_page: "http://3.1.29.26/venderCOVID/API/request-history.php",
      // url_approve: "http://3.1.29.26/venderCOVID/API/approve.php",

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
          text: "มีอาการไอ หรือเจ็บคอ หรือน้ำมูก หรือเสมหะ หรือไม่ได้กลิ่น หรือไม่รับรส หรือปวดกล้ามเนื้อ หรือหายใจเหนื่อย หรือหายใจลำบาก",
          textEng:
            "(Do you have a cough or sore throats or runny nose or lose taste or smell or muscle aches or shortness of breath?)",
        },
        {
          text: "ภายใน 25 วันที่ผ่านมา ท่านหรือบุคคลใกล้ชิดได้เดินทางมาจากประเทศที่มีอัตราการระบาดของไข้ฝีดาษลิงสูง เช่น ประเทศในแถบทวีปแอฟริกากลาง เช่น ไนจีเรีย และคองโก และประเทศในยุโรป",
          textEng:
            "(Travel from countries with high rates of Monkeypox outbreaks, such as Central African (Nigeria, Congo), and European countries within past 25 days.)",
        },
        {
          text: "ภายใน 25 วันที่ผ่านมา ท่านหรือบุคคลใกล้ชิด มีอาการไข้ร่วมกับอาการใดอาการหนึ่งต่อไปนี้ ปวดหลัง ต่อมน้ำเหลืองโต มีผื่นกระจายตามลำตัว มีลักษณะเป็นตุ่มนูน ตุ่มน้ำใส ตุ่มหนอง หรือตุ่มตกสะเก็ด",
          textEng:
            "(Have any of the following symptoms: back pain, enlarged lymph nodes, body rash, clear water blister, pustular blister or scaly blister within past 25 days.)",
        },
        {
          text: "ภายใน 25 วันที่ผ่านมา ท่านหรือบุคคลใกล้ชิดได้สัมผัสโดยตรงกับเลือด สารคัดหลั่ง หรือตุ่มหนองของสัตว์ที่ติดเชื้อหรือสัตว์ป่า",
          textEng:
            "(Direct contact with the blood, secretions or pustules of an infected animal or wild animal within past 25 days.)",
        },
        {
          text: "ภายใน 25 วันที่ผ่านมา ท่านหรือบุคคลใกล้ชิดได้สัมผัสโดยตรงกับสารคัดหลั่ง เช่น ไอ จาม ผื่น ตุ่มหนอง น้ำหนอง สิ่งของที่ปนเปื้อนเชื้อของผู้ป่วยไข้ฝีดาษลิง",
          textEng:
            "(Direct contact with secretions such as coughing, sneezing, rashes, pustules, pus, objects contaminated with Monkeypox patients within past 25 days)",
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

      axios.post(this.url_approve, result).then(({ data }) => {
        // console.log(data);
        if (data.state) {
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
      // console.log(this.infoCancel);
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
