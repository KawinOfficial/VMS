<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="backdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header pb-0">
            <div>
               <h4 class="modal-title font-thai fw-bold" id="backdropLabel">ยืนยันคำขอ
                  <span>(Confirm Request)</span>
               </h4>
               <h5>ID: <b>{{ modalInfo[0]?.number }}</b></h5>
            </div>
            <div class="m-0 p-0">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body" style="height: 80vh">
            <div class="col-12">
               <!-- GenInfo -->
               <div class="row mb-4 mt-2">
                  <div class="col-12">
                     <h5 class="font-thai fw-bold" id="genInfo">ข้อมูลทั่วไป
                        <span class="fw-bold small">(General Information)</span>
                     </h5>
                  </div>
                  <div class="col-12 pb-2">
                     <label for="Name" class="font-thai">ชื่อ - นามสกุล <span>(Fullname)</span></label>
                     <input disabled class="form-control font-thai fw-bold" type="text" id="Name"
                        :value="modalInfo[0]?.name" />
                  </div>
                  <div class="col-12 pb-3">
                     <label for="Company" class="font-thai">หน่วยงาน <span>(Organization / Company)</span></label>
                     <input disabled class="form-control font-thai fw-bold" type="text" id="Company"
                        :value="modalInfo[0]?.company" />
                  </div>
                  <div class="col-12 d-flex">
                     <h6 class="fw-bold">Status :</h6>
                     <h6 class="badge  rounded-pill ms-2" :class="status ? ' bg-danger blink-status' : 'bg-success'">
                        {{ status ? 'Please check Information.' : 'Normal' }}
                     </h6>
                  </div>
               </div>

               <!-- Button -->
               <div class="row mb-4" align="end">
                  <div class="col-4">
                     <button type="button" class="btn btn-success btn-sm rounded-pill font-thai" data-bs-dismiss="modal"
                        @click="handleConfirm(modalInfo[0])">
                        ยืนยัน<span>(Confirm)</span>
                     </button>
                  </div>
                  <div class="col-4">
                     <button type="button" class="btn btn-danger btn-sm rounded-pill  font-thai" data-bs-toggle="modal"
                        data-bs-target="#cancelModal" @click="infoCancel = modalInfo[0]">
                        ยกเลิก<span>(Cancel)</span>
                     </button>
                  </div>
                  <div class="col-4" align="center">
                     <button type="button" class="btn btn-secondary btn-sm rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#timelineModal">
                        Timeline
                     </button>
                  </div>
               </div>

               <!-- Purpose -->
               <div class="row mb-4">
                  <div class="col-12">
                     <h5 class="font-thai fw-bold " id="purpose">วัตถุประสงค์การขอเข้าพื้นที่
                        <span class="fw-bold small">(Purpose of Visiting)</span>
                     </h5>
                  </div>
                  <div class="col-12 pb-2">
                     <label for="nameVisit" class="font-thai">ชื่อผู้เข้าพบ <span>(To Visit)</span></label>
                     <input disabled class="form-control font-thai " type="text" id="nameVisit"
                        :value="modalInfo[0]?.toVisit" />
                  </div>
                  <div class="col-12 pb-2">
                     <label for="purpose" class="font-thai">ติดต่อภารกิจเรื่อง <span>(Contact Purpose)</span></label>
                     <textarea disabled class="form-control font-thai " rows="3" id="purpose"
                        :value="modalInfo[0]?.purposeVisit"></textarea>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-5 pt-2 pe-0">
                           <label for="visitDate" class="font-thai">วันที่ต้องการเข้าพบ<br />
                              <span>(Visit date)</span>
                           </label>
                        </div>
                        <div class="col-7 pt-2">
                           <input disabled class="form-control " type="text" id="visitDate"
                              :value="modalInfo[0]?.visitDate.split('-').reverse().join('/')" />
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Vaccination -->
               <div class="row mb-4">
                  <div class="col-12">
                     <h5 class="font-thai fw-bold" id="vaccination">ข้อมูลการฉีดวัคซีน
                        <span class="fw-bold small">(COVID-19 Vaccination History)</span>
                     </h5>
                  </div>

                  <div v-for="k in vaccine" :key="k">
                     <div class="row">
                        <div class="col-6 pb-2">
                           <label for="firstdate" class="font-thai">เข็มที่ <b>{{ k }}</b> วันที่ <br /><span
                                 class="small text-nowrap">
                                 (Date of {{ k }} dose vaccination)</span></label>
                           <input disabled class="form-control" type="text" id="firstdate" aria-label="firstdate"
                              :value="doseDate[k-1]?.split('-').reverse().join('/')" />
                        </div>
                        <div class="col-6 pb-2">
                           <label for="vaccine1" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                                 (Name of Vaccination)</span></label>
                           <input disabled class="form-control " type="text" id="vaccine1" :value="vaccineDose[k-1]" />
                        </div>
                     </div>
                  </div>
               </div>

               <!-- ATK -->
               <div class="row mb-3">
                  <div class="col-12">
                     <h5 class="font-thai fw-bold " id="ATK">ข้อมูลการตรวจ <span>ATK</span>
                        <span class="fw-bold small">(ATK History)</span>
                     </h5>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-6 pt-2 pe-0">
                           <label for="atkDate" class="font-thai">วันที่ตรวจล่าสุด
                              <span class="text-nowrap">(Last ATK Test Date)</span></label>
                        </div>
                        <div class="col-6 pt-2">
                           <input disabled class="form-control " type="text" id="atkDate"
                              :value="modalInfo[0]?.atkDate.split('-').reverse().join('/')" />
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-6 pt-2 pe-0">
                           <p class="font-thai" id="genInfo">ผลการตรวจ<span class="text-nowrap"> (ATK Result)</span>
                           </p>
                        </div>
                        <div class="col-6">
                           <input disabled class="form-control" type="text" :value="modalInfo[0]?.atk">
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Question -->
               <div class="row mb-3">
                  <div class="col-12">
                     <table class="table table-hover text-center text-sm-center">
                        <thead class="bg-light">
                           <tr>
                              <th scope="col" class="small font-thai" style="width:60%"> รายละเอียด </th>
                              <th scope="col" class="small font-thai" style="width:15%"> ใช่ <span>(Yes)</span> </th>
                              <th scope="col" class="small font-thai" style="width: 15%"> ไม่ใช่ <span>(No)</span></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr v-for="info,i in optionQuestion" :key="i">
                              <td>
                                 <p class="font-thai text-start ps-3 my-0">{{info.text}}</p>
                                 <p class="text-start small ps-3 my-0">{{info.textEng}}</p>
                              </td>
                              <td>
                                 <input v-if="question[0][i] == 'true'" type="radio" class="form-check-input" checked
                                    disabled>
                                 <input v-else type="radio" class="form-check-input " disabled>
                              </td>
                              <td>
                                 <input v-if="question[0][i] == 'false'" type="radio" class="form-check-input" checked
                                    disabled>
                                 <input v-else type="radio" class="form-check-input " disabled>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>

               <!-- Entourage -->
               <div class="row">
                  <div class="col-12">
                     <h5 class="font-thai fw-bold " id="entourage">ข้อมูลผู้ติดตาม
                        <span class="fw-bold small">(Entourage Information)</span>
                     </h5>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-6 pt-2 pe-0">
                           <p class="font-thai">จำนวนผู้ติดตาม
                              <span class="text-nowrap">(Number of Entourage)</span>
                           </p>
                        </div>
                        <div class="col-6 pt-2">
                           <input disabled class="form-control " type="text" :value="modalInfo.length - 1" />
                        </div>
                        <div v-if="modalInfo.length != 1" class="col-12" align="end">
                           <button type="button" class="btn btn-primary font-thai btn-sm rounded-pill"
                              data-bs-toggle="modal" data-bs-target="#entourageModal">
                              รายละเอียดผู้ติดตาม <span>(Entourage details)</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Timeline Modal -->
<div class="modal fade" id="timelineModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
   aria-labelledby="timelineModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title font-thai fw-bold" id="timelineModal">บันทึกการเดินทาง
               <span>(Timeline Infomation)</span>
            </h4>
            <div class="m-0 p-0">
               <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmModal">
                  <i class="fas fa-chevron-left"></i>
               </button>
            </div>
         </div>
         <div class="modal-body">
            <div class="col-12">
               <!-- Table -->
               <div class="col-12 overflow-auto m-0" style="height: 70vh;">
                  <table class="table table-hover text-center position-relative">
                     <thead class=" thead-fixed bg-light">
                        <tr>
                           <th scope="col" class="small font-thai">
                              วันเดินทางไป-กลับ <span class="small text-nowrap">(Date of Depart - Return)</span>
                           </th>
                           <th scope="col" class="small font-thai">
                              จังหวัด/เขต ต้นทาง - จังหวัด/เขต ปลายทาง <span class="small text-nowrap">
                                 (Origin’s Province/District – Destination’s Province/District)</span>
                           </th>
                           <th scope="col" class="small font-thai text-nowrap">
                              พาหนะที่ใช้ในการเดินทาง <br /><span class="small">(Travel Vehicle)</span>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="info,i in timeline[0]" :key="i">
                           <td>
                              <p>{{ info.date.split('-').reverse().join('/') }}</p>
                           </td>
                           <td>
                              <input disabled type="text" class="form-control form-control-sm font-thai"
                                 id="destination" :value="info.location">
                           </td>
                           <td>
                              <input disabled type="text" class="form-control form-control-sm font-thai"
                                 id="destination" :value="info.vehicle">
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title font-thai fw-bold" id="staticBackdropLabel">ยกเลิกคำขอ
               <span>(Cancel Request)</span>
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="col-12">
               <label for="comment" class="font-thai">เหตุผลการยกเลิกคำขอ</label>
               <textarea class="form-control pt-3" placeholder="ไม่เกิน 100 ตัวอักษร" rows="4" id="comment"
                  v-model="note"></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <div class="row">
               <div class="col-6">
                  <button type="button" class="btn btn-success btn-sm rounded-pill font-thai" data-bs-dismiss="modal"
                     @click="handleCancel()">
                     ยืนยัน<span>(Confirm)</span>
                  </button>
               </div>
               <div class="col-6">
                  <button type="button" class="btn btn-danger btn-sm rounded-pill font-thai" data-bs-dismiss="modal">
                     ยกเลิก<span>(Cancel)</span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Entourage Modal -->
<div class="modal fade" id="entourageModal" tabindex="-1" aria-labelledby="backdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header pb-0">
            <div>
               <h4 class="modal-title font-thai fw-bold" id="backdropLabel">รายละเอียดผู้ติดตาม
                  <span>(Entourage details)</span>
               </h4>
               <h5>ID: <b>{{ modalInfo[0]?.number }}</b></h5>
            </div>
            <div class="m-0 p-0">
               <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmModal">
                  <i class="fas fa-chevron-left"></i>
               </button>
            </div>
         </div>
         <div class="modal-body" style="height: 80vh">
            <!-- Entourage Info -->
            <div class="row py-2" v-for="info,i in modalInfo.slice(1)" :key="i">
               <div class="col-12">
                  <h5 class="font-thai fw-bold text-center" id="genInfo">ผู้ติดตามคนที่ {{ i + 1 }} </h5>
               </div>
               <div class="col-12 pb-3">
                  <label for="Name" class="font-thai">ชื่อ - นามสกุล <span>(Fullname)</span></label>
                  <input disabled class="form-control font-thai fw-bold" type="text" id="Name" :value="info?.name" />
               </div>
               <!-- Vaccine Info  -->
               <div class="col-12">
                  <h6 class="font-thai fw-bold" id="vaccination">ข้อมูลการฉีดวัคซีน
                     <span class="fw-bold small">(COVID-19 Vaccination History)</span>
                  </h6>
               </div>
               <div class="col-6 pb-2">
                  <label for="firstdate" class="font-thai">เข็มที่ <b>1</b> วันที่ <br /><span
                        class="small text-nowrap">
                        (Date of 1st dose vaccination)</span></label>
                  <input disabled class="form-control" type="text"
                     :value="info?.doseDate1.split('-').reverse().join('/')" />
               </div>
               <div class="col-6 pb-2">
                  <label for="vaccine1" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                        (Name of Vaccine)</span></label>
                  <input disabled class="form-control" type="text" :value="info?.vaccineDose1" />
               </div>
               <div class="col-6 pb-2">
                  <label for="seconddate" class="font-thai">เข็มที่ <b>2</b> วันที่ <br /><span
                        class="small text-nowrap">
                        (Date of 2nd dose vaccination)</span></label>
                  <input disabled class="form-control" type="text"
                     :value="info?.doseDate2.split('-').reverse().join('/')" />
               </div>
               <div class="col-6 pb-2">
                  <label for="vaccine2" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                        (Name of Vaccine)</span></label>
                  <input disabled class="form-control" type="text" :value="info?.vaccineDose2" />
               </div>

               <!-- ATK Info -->
               <div class="col-12">
                  <h6 class="font-thai fw-bold " id="ATK">ข้อมูลการตรวจ <span>ATK</span>
                     <span class="fw-bold small">(ATK History)</span>
                  </h6>
               </div>
               <div class="col-12">
                  <div class="row">
                     <div class="col-6 pt-2 pe-0">
                        <label for="atkDate" class="font-thai">วันที่ตรวจล่าสุด
                           <span class="text-nowrap">(Last ATK Test Date)</span></label>
                     </div>
                     <div class="col-6 pt-2">
                        <input disabled class="form-control" type="text" id="atkDate"
                           :value="info?.atkDate.split('-').reverse().join('/')" />
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="row">
                     <div class="col-6 pt-3 pe-0">
                        <p class="font-thai" id="genInfo">ผลการตรวจ<span class="text-nowrap "> (ATK Result)</span>
                        </p>
                     </div>
                     <div class="col-6 pt-2">
                        <input disabled class="form-control" type="text" :value="info?.atk">
                     </div>
                  </div>
               </div>

               <!-- Question -->
               <div class="col-12 pt-3">
                  <h6 class="font-thai fw-bold">ปัจจุบันท่านมีอาการดังต่อไปนี้หรือไม่ </h6>
               </div>
               <div class="col-12">
                  <table class="table table-hover text-center text-sm-center">
                     <thead class=" bg-light">
                        <tr>
                           <th scope="col" class="small font-thai" style="width:60%"> รายละเอียด </th>
                           <th scope="col" class="small font-thai" style="width:15%"> ใช่ <span>(Yes)</span> </th>
                           <th scope="col" class="small font-thai" style="width: 15%"> ไม่ใช่ <span>(No)</span></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="info,j in optionQuestion" :key="j">
                           <td>
                              <p class="font-thai text-start ps-3 my-0">{{info.text}}</p>
                              <p class="text-start small ps-3 my-0">{{info.textEng}}</p>
                           </td>
                           <td>
                              <input v-if="question[i + 1][j] == 'true'" type="radio" class="form-check-input" checked
                                 disabled>
                              <input v-else type="radio" class="form-check-input " disabled>
                           </td>
                           <td>
                              <input v-if="question[i + 1][j] == 'false'" type="radio" class="form-check-input" checked
                                 disabled>
                              <input v-else type="radio" class="form-check-input " disabled>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>

               <!-- Entourage Timeline -->
               <div class="col-12 mt-2">
                  <div class="col-12">
                     <h6 class="font-thai fw-bold ">ข้อมูลบันทึกการเดินทาง
                        <span class="fw-bold small">(Timeline Information)</span>
                     </h6>
                  </div>
                  <!-- Table -->
                  <div class="col-12 overflow-auto m-0" style="height: 50vh;">
                     <table class="table table-hover text-center position-relative">
                        <thead class=" thead-fixed bg-light">
                           <tr>
                              <th scope="col" class="small font-thai">
                                 วันเดินทางไป-กลับ <span class="small text-nowrap">(Date of Depart - Return)</span>
                              </th>
                              <th scope="col" class="small font-thai">
                                 จังหวัด/เขต ต้นทาง - จังหวัด/เขต ปลายทาง <span class="small text-nowrap">
                                    (Origin’s Province/District – Destination’s Province/District)</span>
                              </th>
                              <th scope="col" class="small font-thai  text-nowrap">
                                 พาหนะที่ใช้ในการเดินทาง <br /><span class="small">(Travel Vehicle)</span>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr v-for="data,j in timeline[i + 1]" :key="j">
                              <td>
                                 <p>{{ data.date.split('-').reverse().join('/') }}</p>
                              </td>
                              <td>
                                 <input disabled type="text" class="form-control font-thai form-control-sm"
                                    id="destination" :value="data.location">
                              </td>
                              <td>
                                 <input disabled type="text" class="form-control font-thai form-control-sm"
                                    id="destination" :value="data.vehicle">
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <hr />
            </div>
         </div>
      </div>
   </div>
</div>