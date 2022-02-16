<div class="row mt-2">
   <!-- Question -->
   <div class="col-12">
      <h5 class="font-thai fw-bold">ปัจจุบันท่านมีอาการดังต่อไปนี้หรือไม่ </h5>
   </div>
   <div class="col-12">
      <table class="table table-hover text-center position-relative text-sm-center">
         <thead class=" thead-fixed bg-light">
            <tr>
               <th scope="col" class="small font-thai" style="width:60%"> รายละเอียด </th>
               <th scope="col" class="small font-thai" style="width:15%"> ใช่ <span>(Yes)</span> </th>
               <th scope="col" class="small font-thai" style="width: 15%"> ไม่ใช่
                  <span>(No)</span>
               </th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="info,i in optionQuestion" :key="i">
               <td>
                  <p class="font-thai text-start ps-3 my-0">{{info.text}}</p>
                  <p class="text-start small ps-3 my-0">{{info.textEng}}</p>
               </td>
               <td>
                  <input v-model="form.question[i]" type="radio" class="form-check-input" :name="'check' + i"
                     value="true" required>
               </td>
               <td>
                  <input v-model="form.question[i]" type="radio" class="form-check-input" :name="'check' + i"
                     value="false" required>
               </td>
            </tr>
         </tbody>
      </table>
   </div>

   <!-- Entourage Question -->
   <div v-for="i in form.entourage" :key="i">
      <p class="font-thai fw-bold text-center">ผู้ติดตามคนที่ {{ i }}</p>
      <table class="table table-hover text-center position-relative text-sm-center">
         <thead class=" thead-fixed bg-light">
            <tr>
               <th scope="col" class="small font-thai" style="width:60%"> รายละเอียด </th>
               <th scope="col" class="small font-thai" style="width:15%"> ใช่ <span>(Yes)</span> </th>
               <th scope="col" class="small font-thai" style="width: 15%"> ไม่ใช่ <span>(No)</span></th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="info,n in optionQuestion" :key="n">
               <td>
                  <p class="font-thai text-start ps-3 my-0">{{info.text}}</p>
                  <p class="text-start small ps-3 my-0">{{info.textEng}}</p>
               </td>
               <td>
                  <input v-model="form.entourageInfo.questionEn[i-1][n]" type="radio" class="form-check-input "
                     :name="'check' + i + n" value="true">
               </td>
               <td>
                  <input v-model="form.entourageInfo.questionEn[i-1][n]" type="radio" class="form-check-input "
                     :name="'check' + i + n" value="false">
               </td>
            </tr>
         </tbody>
      </table>
   </div>

   <!-- Timeline -->
   <div class="col-12">
      <h5 class="font-thai fw-bold">ข้อมูลการเดินทาง<span class="fw-bold small">
            (Timeline Information)</span>
      </h5>
      <p class="font-thai pt-0 mb-2 fw-bold text-secondary">หมายเหตุ: ระบุโดยสังเขป <span>(Kindly provide a brief
            information)</span></p>
      <p class="font-thai pt-1 m-0 small">คำชี้แจง: ระบุแจ้งการเดินทางทั้งจากต่างประเทศ และภายในประเทศ ในช่วง 14
         วันที่ผ่านมา
         (โปรดระบุจังหวัดและอำเภอ วันเดินทางไปและกลับ และ พาหนะที่ใช้ในการเดินทาง)
      </p>
      <p class="small m-0 ">Statement: Please provide your 14-day travel history both domestic and international
         (please specify details on the province, district, the date of travelling, and the travel vehicle)
      </p>
   </div>

   <!-- Table -->
   <div class="col-12 overflow-auto m-0" style="height: 52vh;">
      <table class="table table-hover text-center position-relative">
         <thead class=" thead-fixed bg-light">
            <tr>
               <th scope="col" class="small font-thai" style="width: 20%">
                  วันเดินทางไป-กลับ <span class="small text-nowrap">(Date of Depart - Return)</span>
               </th>
               <th scope="col" class="small font-thai" style="width: 50%">
                  จังหวัด/เขต ต้นทาง - จังหวัด/เขต ปลายทาง <span class="small text-nowrap">
                     (Origin’s Province/District – Destination’s Province/District)</span>
               </th>
               <th scope="col" class="small font-thai" style="width: 30%">
                  พาหนะที่ใช้ในการเดินทาง <span class="small text-nowrap">(Travel Vehicle)</span>
               </th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="i in 14" :key="i">
               <td>
                  <p class=" fw-bold">{{ form.timeline.date[i-1] }}</p>
               </td>
               <td>
                  <input v-model="form.timeline.location[i-1]" type="text" class="form-control form-control-sm"
                     id="destination" aria-label="destination">
               </td>
               <td>
                  <select v-model="form.timeline.vehicle[i-1]" class="form-select form-select-sm font-thai"
                     aria-label="vehicleSelect">
                     <option v-for="option in optionVehicle" :value="option.value" class="font-thai">
                        {{ option.text }}
                     </option>
                  </select>
               </td>
            </tr>
         </tbody>
      </table>
      <hr />

      <!-- Entourage timeline -->
      <div v-for="i in form.entourage" :key="i">
         <p class="font-thai fw-bold text-center">ผู้ติดตามคนที่ {{ i }}</p>
         <table class="table table-hover text-center position-relative table-info">
            <thead class=" thead-fixed">
               <tr>
                  <th scope="col" class="small font-thai" style="width: 20%">
                     วันเดินทางไป-กลับ <span class="small text-nowrap">(Date of Depart - Return)</span>
                  </th>
                  <th scope="col" class="small font-thai" style="width: 50%">
                     จังหวัด/เขต ต้นทาง - จังหวัด/เขต ปลายทาง <span class="small text-nowrap">
                        (Origin’s Province/District – Destination’s Province/District)</span>
                  </th>
                  <th scope="col" class="small font-thai" style="width: 30%">
                     พาหนะที่ใช้ในการเดินทาง <span class="small text-nowrap">(Travel Vehicle)</span>
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr v-for="n in 14" :key="n">
                  <td>
                     <p class=" fw-bold">{{ form.timeline.date[n-1] }}</p>
                  </td>
                  <td>
                     <input v-model="form.entourageInfo.timeline.location[i-1][n-1]" type="text"
                        class="form-control form-control-sm" id="destination" aria-label="destination">
                  </td>
                  <td>
                     <select v-model="form.entourageInfo.timeline.vehicle[i-1][n-1]"
                        class="form-select form-select-sm font-thai" aria-label="vehicleSelect">
                        <option v-for="option in optionVehicle" :value="option.value" class="font-thai">
                           {{ option.text }}
                        </option>
                     </select>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>

   <!-- Button -->
   <div class="col-12 d-flex justify-content-end">
      <button class="btn btn-success btn-sm rounded-pill me-3 h-75 mt-2 font-thai" data-bs-toggle="modal"
         data-bs-target="#confirmModal" @click="handleInput">ยืนยัน
         <span>(Confirm)</span></button>
      <button type="button" class="btn btn-danger btn-sm rounded-pill h-75 mt-2 font-thai"
         @click="handleCancel()">ยกเลิก
         <span>(Cancel)</span></button>
   </div>
</div>