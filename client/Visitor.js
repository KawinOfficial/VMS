const app = Vue.createApp({
  data() {
    return {
      url_me: "/venderCOVID/API/visitor.php",
      // url_me: "http://3.1.29.26/venderCOVID/API/visitor.php",
      chkAdmit1: false,
      chkAdmit2: false,
      chkAdmit3: false,
      confirm: false,

      form: {
        name: "",
        surname: "",
        company: "",
        toVisit: "",
        purposeVisit: "",
        visitDate: "",
        vaccine: "",
        vaccineDose: [],
        doseDate: [],
        atk: "",
        atkDate: "",
        status: "",
        datetime: "",
        question: [],
        timeline: {
          date: [],
          location: [],
          vehicle: [],
        },
        entourage: 0,
        entourageInfo: {
          name: [],
          surname: [],
          vaccine: [],
          vaccineDoseEn: Array(5)
            .fill(null)
            .map(() => []),
          doseDateEn: Array(5)
            .fill(null)
            .map(() => []),
          atkDate: [],
          atk: [],
          questionEn: Array(100)
            .fill(0)
            .map(() => []),
          timeline: {
            location: Array(100)
              .fill(0)
              .map(() => []),
            vehicle: Array(100)
              .fill(0)
              .map(() => []),
          },
        },
      },

      options: [
        { text: "AstraZeneca", value: "AstraZeneca" },
        { text: "Johnson & Johnson", value: "Johnson & Johnson" },
        { text: "Moderna", value: "Moderna" },
        { text: "Pfizer", value: "Pfizer" },
        { text: "Sinopharm", value: "Sinopharm" },
        { text: "Sinovac", value: "Sinovac" },
        { text: "Other", value: "Other" },
      ],
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
      optionVehicle: [
        {
          text: "รถส่วนตัว (Private Vehicle)",
          value: "รถส่วนตัว (Private Vehicle)",
        },
        {
          text: "รถบริษัท (Company Vehicle)",
          value: "รถบริษัท (Company Vehicle)",
        },
        {
          text: "ขนส่งสาธารณะ (Public Transport)",
          value: "ขนส่งสาธารณะ (Public Transport)",
        },
        { text: "อื่นๆ (Others)", value: "อื่นๆ (Others)" },
      ],
    };
  },
  methods: {
    checkModal() {
      Swal.fire({
        icon: "success",
        title: "บันทึกข้อมูลสำเร็จ",
        html: `
      <p class="text-start font-thai mb-0">ทางผู้ประสานงานจะแจ้งผลการพิจารณาให้ท่านทราบอีกครั้ง
      ขอให้ท่านเตรียมข้อมูลเหล่านี้ให้พร้อมเพื่อแสดงต่อเจ้าหน้าที่หน่วยงานรักษาความแลอดภัยของทางบริษัทฯ ในวันที่ท่านเดินทาง</p>
      <p class="text-start small">(SNC's coordinator will inform you consideration result again. Please prepare this information to show the staff of the SNC's safety department.)</p>
      <p class="text-start font-thai fw-bold">1. ประวัติการฉีดวัคซีน <span class="small">(Vaccination history)</span></p>
      <p class="text-start font-thai  fw-bold">2. บริษัทฯ กำหนดให้บุคคลภายนอกทุกท่านจะ <ins class="text-danger">ต้องตรวจคัดกรองโควิทด้วยชุดตรวจ ATK เพื่อยืนยันผลตรวจที่ป้อม รปภ. ก่อนเข้าพื้นที่บริษัท</ins> โดยผลตรวจจะมีผล 3 วัน ทั้งนี้ท่านสามารถเตรียมชุดตรวจ ATK มาด้วยตนเอง หรือซื้อที่ป้อม รปภ. ได้ในราคาชุดละ 40 บาท
      <br/><span class="small">(SNC Group requires all visitors to be screened for Covid-19 with an ATK test kit to confirm the Negative-results at the security guards department before entering the company area. The results will be effective for 3 days. Visitor can prepare the ATK test kit by themselves or buy at the security guard department for 40 baht per set.)</span></p>
      <p class="text-start font-thai  mb-0">ท่านสามารถแสดงหลักฐานผ่านแอปพลิเคชันหมอพร้อม หรือเอกสารหลักฐานใดๆ ที่เกี่ยวข้อง</p>
      <p class="text-start small  mb-0">(You can show evidence through the Mor Prom application or any documentary evidence related.)</p>
      `,
        confirmButtonText: "รับทราบ",
        customClass: "swal-width",
      });
    },

    handleConfirm() {
      const {
        company,
        toVisit,
        purposeVisit,
        visitDate,
        datetime,
        entourage,
        question,
        vaccine,
        vaccineDose,
        doseDate,
        timeline: { date, location, vehicle },
      } = this.form;
      const {
        name,
        surname,
        vaccine: vaccineEn,
        vaccineDoseEn,
        doseDateEn,
        atkDate,
        atk,
        questionEn,
      } = this.form.entourageInfo;
      const { location: locationEn, vehicle: vehicleEn } =
        this.form.entourageInfo.timeline;

      const questionEntourage = questionEn.slice(0, entourage);

      const timeline = date.map((data, i) => ({
        date: data.split("/").reverse().join("-"),
        location: location[i] || "",
        vehicle: vehicle[i] || "",
      }));

      const timelineEn = Array(entourage)
        .fill()
        .map((_, i) => {
          return date.map((data, j) => ({
            date: data.split("/").reverse().join("-"),
            location: locationEn[i][j] || "",
            vehicle: vehicleEn[i][j] || "",
          }));
        });

      let visitInfo = [
        {
          name: this.form.name + " " + this.form.surname,
          company: company,
          toVisit: toVisit,
          purposeVisit: purposeVisit,
          visitDate: visitDate,
          vaccine: vaccine,
          vaccineDose1: vaccineDose[0] || "-",
          vaccineDose2: vaccineDose[1] || "-",
          vaccineDose3: vaccineDose[2] || "-",
          vaccineDose4: vaccineDose[3] || "-",
          vaccineDose5: vaccineDose[4] || "-",
          doseDate1: doseDate[0] || "-",
          doseDate2: doseDate[1] || "-",
          doseDate3: doseDate[2] || "-",
          doseDate4: doseDate[3] || "-",
          doseDate5: doseDate[4] || "-",
          atk: this.form.atk,
          atkDate: this.form.atkDate,
          status: this.form.status,
          datetime: datetime,
          question: question,
          timeline,
        },
      ];

      let visitAll = [];
      if (entourage != 0) {
        visitAll = Array(entourage)
          .fill()
          .map((_, i) => ({
            name: name[i] + " " + surname[i] || "-",
            company: company,
            toVisit: toVisit,
            purposeVisit: purposeVisit,
            visitDate: visitDate,
            vaccine: vaccineEn[i],
            vaccineDose1: vaccineDoseEn[i][0] || "-",
            vaccineDose2: vaccineDoseEn[i][1] || "-",
            vaccineDose3: vaccineDoseEn[i][2] || "-",
            vaccineDose4: vaccineDoseEn[i][3] || "-",
            vaccineDose5: vaccineDoseEn[i][4] || "-",
            doseDate1: doseDateEn[i][0] || "-",
            doseDate2: doseDateEn[i][1] || "-",
            doseDate3: doseDateEn[i][2] || "-",
            doseDate4: doseDateEn[i][3] || "-",
            doseDate5: doseDateEn[i][4] || "-",
            atkDate: atkDate[i] || "-",
            atk: atk[i] || "-",
            datetime: datetime,
            question: questionEntourage[i],
            timeline: timelineEn[i],
          }));
      }
      const result = [...visitInfo, ...visitAll];
      // console.log(result);

      axios.post(this.url_me, result).then(({ data: { state } }) => {
        if (state) {
          Swal.fire({
            icon: "success",
            title: "บันทึกข้อมูลสำเร็จ",
            html: `
      <p class="text-start font-thai mb-0">ทางผู้ประสานงานจะแจ้งผลการพิจารณาให้ท่านทราบอีกครั้ง
      ขอให้ท่านเตรียมข้อมูลเหล่านี้ให้พร้อมเพื่อแสดงต่อเจ้าหน้าที่หน่วยงานรักษาความแลอดภัยของทางบริษัทฯ ในวันที่ท่านเดินทาง</p>
      <p class="text-start small">(SNC's coordinator will inform you consideration result again. Please prepare this information to show the staff of the SNC's safety department.)</p>
      <p class="text-start font-thai fw-bold">1. ประวัติการฉีดวัคซีน <span class="small">(Vaccination history)</span></p>
      <p class="text-start font-thai  fw-bold">2. บริษัทฯ กำหนดให้บุคคลภายนอกทุกท่านจะ <ins class="text-danger">ต้องตรวจคัดกรองโควิทด้วยชุดตรวจ ATK เพื่อยืนยันผลตรวจที่ป้อม รปภ. ก่อนเข้าพื้นที่บริษัท</ins> โดยผลตรวจจะมีผล 3 วัน ทั้งนี้ท่านสามารถเตรียมชุดตรวจ ATK มาด้วยตนเอง หรือซื้อที่ป้อม รปภ. ได้ในราคาชุดละ 40 บาท
      <br/><span class="small">(SNC Group requires all visitors to be screened for Covid-19 with an ATK test kit to confirm the Negative-results at the security guards department before entering the company area. The results will be effective for 3 days. Visitor can prepare the ATK test kit by themselves or buy at the security guard department for 40 baht per set.)</span></p>
      <p class="text-start font-thai  mb-0">ท่านสามารถแสดงหลักฐานผ่านแอปพลิเคชันหมอพร้อม หรือเอกสารหลักฐานใดๆ ที่เกี่ยวข้อง</p>
      <p class="text-start small  mb-0">(You can show evidence through the Mor Prom application or any documentary evidence related.)</p>
      `,
            confirmButtonText: "รับทราบ",
            customClass: "swal-width",
          }).then(() => window.location.reload());
        } else {
          Swal.fire({
            icon: "error",
            title: "บันทึกข้อมูลไม่สำเร็จ",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    },

    handleCancel() {
      // console.log(this.form.question.length);
      Swal.fire({
        icon: "warning",
        title: "ยกเลิกการบันทึกข้อมูล? (Cancel save data?)",
        showDenyButton: true,
        confirmButtonText: "ยืนยัน (Confirm)",
        denyButtonText: "ยกเลิก (Cancel)",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: "success",
            title: "ยกเลิกสำเร็จ",
            timer: 1500,
            showConfirmButton: false,
          });
        }
      });
    },

    handleInput() {
      const {
        name,
        surname,
        company,
        toVisit,
        purposeVisit,
        visitDate,
        vaccineDose,
        doseDate,
        atk,
        atkDate,
        entourage,
        question,
      } = this.form;
      const {
        name: nameEn,
        surname: surnameEn,
        vaccineDoseEn,
        doseDateEn,
        atk: atkEn,
        atkDate: atkDateEn,
        questionEn,
      } = this.form.entourageInfo;

      const vaccineDose1 = vaccineDose[0];
      const vaccineDose2 = vaccineDose[1];
      const doseDate1 = doseDate[0];
      const doseDate2 = doseDate[1];

      if (
        (name != "") &
        (surname != "") &
        (company != "") &
        (toVisit != "") &
        (purposeVisit != "") &
        (visitDate != "") &
        (vaccineDose1 != undefined) &
        (vaccineDose2 != undefined) &
        (doseDate1 != undefined) &
        (doseDate2 != undefined) &
        (atk != "") &
        (atkDate != "") &
        (question.length == "8")
      ) {
        if (entourage != "0") {
          if (
            (nameEn.length == entourage) &
            (surnameEn.length == entourage) &
            (vaccineDoseEn[entourage - 1][0] != undefined) &
            (doseDateEn[entourage - 1][0] != undefined) &
            (vaccineDoseEn[entourage - 1][1] != undefined) &
            (doseDateEn[entourage - 1][1] != undefined) &
            (atkEn.length == entourage) &
            (atkDateEn.length == entourage) &
            (questionEn[entourage - 1].length == "8")
          ) {
            return (this.confirm = false);
          } else {
            this.confirm = true;
          }
        } else {
          return (this.confirm = false);
        }
      } else {
        return (this.confirm = true);
      }
    },
  },
  mounted() {
    // setInterval(() => console.log(this.form.timeline.date), 1000);
    setTimeout(() => {
      this.form.timeline.date = Array(5)
        .fill()
        .map((_, day) => {
          day += 1;
          const now = new Date(Date.now() - day * 8.64e7);
          let month = now.getMonth() + 1;
          month = month < 10 ? "0" + month : month;
          let date = now.getDate();
          date = date < 10 ? "0" + date : date;
          let dateTime = `${date}/${month}/${now.getFullYear()}`;
          return dateTime;
        });
    }, 0);
  },
});

app.mount("#visitor");
