const app = Vue.createApp({
  data() {
    return {
      url_page: "/venderCOVID/API/authen.php",
      // url_page: "http://3.1.29.26/venderCOVID/API/authen.php",

      form: {
        username: "admin",
        password: "",
      },
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      // console.log(this.form);

      axios.post(this.url_page, this.form).then(({ data }) => {
        console.log(data);
        if (data.state) {
          Swal.fire({
            icon: "success",
            title: "Login success",
            text: data.user,
            showConfirmButton: false,
            timer: 2000,
          }).then(() => (window.location = "Request.php"));
        } else {
          Swal.fire({
            icon: "error",
            title: "Login fail",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    },
  },
});

app.mount("#login");
