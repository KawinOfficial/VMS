<div class="col-12 overflow-auto m-0" style="height: 62vh;">
   <table class="table table-hover text-center align-middle position-relative">
      <thead class="thead-fixed bg-white">
         <tr>
            <th scope="col" style="width: 5%;">No.</th>
            <th scope="col" style="width: 8%;">ID.</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-start ps-3">Organization / Company</th>
            <th scope="col" class="text-start ps-4">To Visit</th>
            <th scope="col">Visit date</th>
            <th scope="col">Status</th>
            <th scope="col">Details</th>
         </tr>
      </thead>
      <tbody>
         <tr v-for="info, i in information" :key="info.id">
            <td> {{ i + 1}}</td>
            <th scope="row">{{info.number}}</th>
            <td class="text-start text-nowrap font-thai ps-5">{{info.name}}</td>
            <td class="text-start text-nowrap ps-5">{{info.company}}</td>
            <td class="text-start text-nowrap font-thai  ps-3">{{info.toVisit}}</td>
            <td>{{info.visitDate.split("-").reverse().join("/")}}</td>

            <!-- Status -->
            <td v-if="info.status == 'disapproved'" class="text-danger fa-lg">
               <i class="fas fa-times-circle"></i>
            </td>
            <td v-else-if="info.status == 'pending'" class="text-warning fa-lg">
               <i class="fas fa-pause-circle"></i>
            </td>
            <td v-else class="text-success fa-lg">
               <i class="fas fa-check-circle"></i>
            </td>

            <td class=" text-nowrap">
               <button class="btn btn-secondary btn-sm me-2 py-0 px-3" data-bs-toggle="modal"
                  data-bs-target="#historyModal" @click="handleModal(info)">
                  <i class="fas fa-info-circle"></i>
               </button>
            </td>
         </tr>
      </tbody>
   </table>

</div>

<div class="row pt-1">
   <div class="col-sm-4 col-12">
      <div class="row">
         <div class="col-4 d-flex justify-content-center ">
            <i class="fas fa-times-circle text-danger me-2 pt-1"></i>
            <p style="font-size: .9em">Disapproved</p>
         </div>
         <div class="col-4 d-flex justify-content-center ">
            <i class="fas fa-pause-circle text-warning me-2 pt-1"></i>
            <p style="font-size: .9em">Pending</p>
         </div>
         <div class="col-4 d-flex justify-content-center ">
            <i class="fas fa-check-circle text-success me-2 pt-1"></i>
            <p style="font-size: .9em">Approved</p>
         </div>
      </div>
   </div>
</div>