<div class="col-12 overflow-auto  m-0" style="height: 65vh;">
   <table class="table table-hover text-center align-middle position-relative">
      <thead class="thead-fixed bg-white">
         <tr>
            <th scope="col" style="width: 5%;">No.</th>
            <th scope="col" style="width: 8%;">ID.</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-start ps-3">Organization / Company</th>
            <th scope="col">To Visit</th>
            <th scope="col">Visit date</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>
         <tr v-for="info, i in getTable()" :key="info.id">
            <td> {{ i + 1}}</td>
            <th scope="row">
               {{info.number}}
            </th>
            <td class="text-start text-nowrap font-thai ps-5">{{info.name}}</td>
            <td class="text-start text-nowrap ps-5">{{info.company}}</td>
            <td class="text-start text-nowrap font-thai ps-5">{{info.toVisit}}</td>
            <td>{{info.visitDate.split("-").reverse().join("/")}}</td>
            <td class=" text-nowrap">
               <button class="btn btn-success btn-sm me-2 py-0 px-3" @click="getModal(info.number)"
                  data-bs-toggle="modal" data-bs-target="#confirmModal">
                  <i class="fas fa-check"></i>
               </button>
               <button type="button" class="btn btn-danger btn-sm py-0 px-3" data-bs-toggle="modal"
                  data-bs-target="#cancelModal" @click="infoCancel = info">
                  <i class="fas fa-times"></i>
               </button>
            </td>
         </tr>
      </tbody>
   </table>
</div>