<template>
  <div class="container">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-user">
            <div class="card-body">
              <div class="form-inline mb-2">
                <label for="date">Date: &nbsp;</label>
                <input
                  @change="refreshStudentsList"
                  v-model="date"
                  name="date"
                  id="date"
                  type="date"
                  class="form-control"
                />
                <button @click="save" class="btn btn-success ml-2">
                  Guardar asistencia
                </button>
                <div class="col" style="text-align: end">
                  <a :href="`/attendanceReport/${this.grupo}`" class="btn btn-info text-white">
                    Reporte de asistencia
                    <i class="fas fa-file-signature ml-1"></i>
                  </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th class="text-center">Asistencia</th>
                  </thead>
                  <tbody>
                    <tr v-for="alumno in alumnos" :key="alumno.id">
                      <td style="max-width: 175px">{{ alumno.id }}</td>
                      <td style="max-width: 175px">{{ alumno.name }}</td>
                      <td style="max-width: 175px">{{ alumno.lastname }}</td>
                      <td>
                        <select
                          id="status"
                          v-model="alumno.status"
                          class="statusClass form-control"
                        >
                          <option
                            class="op"
                            selected="selected"
                            disabled
                            value="unset"
                          >
                            --Select--
                          </option>
                          <option class="op" value="presence">Presence</option>
                          <option class="op" value="absence">Absence</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const UNSET_STATUS = "unset";
export default {
  props: ["grupo"],
  data() {
    return {
      alumnos: [],
      date: "",
    };
  },
  async mounted() {
    this.date = this.getTodaysDate();
    await this.refreshStudentsList();
  },
  methods: {
    getTodaysDate() {
      const date = new Date();
      const month = date.getMonth() + 1;
      const day = date.getDate();
      return `${date.getFullYear()}-${(month < 10 ? "0" : "").concat(
        month
      )}-${(day < 10 ? "0" : "").concat(day)}`;
    },
    async save() {
      // We only need id and status, nothing more
      let studentsMapped = this.alumnos.map((alumno) => {
        return {
          id: alumno.id,
          status: alumno.status,
        };
      });
      // And we need only where status is set
      studentsMapped = studentsMapped.filter(
        (alumno) => alumno.status != UNSET_STATUS
      );
      await axios
        .post("/listado", {
          date: this.date,
          alumnos: JSON.stringify(studentsMapped),
        })
        .then((resp) => {
          console.log(resp.data);
          this.$swal("Asistencia registrada" + "<br>" + this.date);
          let studentDictionary = {};
          this.alumnos = this.alumnos.map((alumno, index) => {
            studentDictionary[alumno.id] = index;
            return {
              id: alumno.id,
              name: alumno.name,
              lastname: alumno.lastname,
              status: UNSET_STATUS,
            };
          });
        })
        .catch(function (error) {
          console.log(error);
          this.$swal({ icon: "error", tittle: "¡Ups!, Ocurrio un error" });
        });
      /* console.log(JSON.stringify(studentsMapped)); */
    },
    /* async reporte(){
       await axios.get(`/attendanceReport/${this.grupo}`).then((response) => {
        console.log(response)
      });
    }, */
    async refreshStudentsList() {
      await axios.get(`/listado/${this.grupo}`).then((response) => {
        this.alumnos = response.data;
      });

      let studentDictionary = {};
      this.alumnos = this.alumnos.map((alumno, index) => {
        studentDictionary[alumno.id] = index;
        return {
          id: alumno.id,
          name: alumno.name,
          lastname: alumno.lastname,
          status: UNSET_STATUS,
        };
      });
    },
  },
};
</script>
