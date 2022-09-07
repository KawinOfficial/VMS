<div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="backdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
      <div class="modal-content">
         <div class="modal-header pb-0">
            <div>
               <h4 class="modal-title font-thai fw-bold" id="backdropLabel">รายละเอียด
                  <span>(Details)</span>
               </h4>
               <h5>ID: <b>{{ modalInfo?.number }}</b></h5>
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
                     <input disabled class="form-control font-thai fw-bold" type="text" id="Name" :value="modalInfo?.name" />
                  </div>

                  <div class="col-12">
                     <label for="Company" class="font-thai">หน่วยงาน <span>(Organization / Company)</span></label>
                     <input disabled class="form-control font-thai fw-bold" type="text" id="Company" :value="modalInfo?.company" />
                  </div>
               </div>

               <!-- Button -->
               <div class="row mb-4" align="end">
                  <div class="col-12" align="center">
                     <button type="button" class="btn btn-secondary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#timelineModal">
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
                     <input disabled class="form-control font-thai " type="text" id="nameVisit" :value="modalInfo?.toVisit" />
                  </div>
                  <div class="col-12 pb-2">
                     <label for="purpose" class="font-thai">ติดต่อภารกิจเรื่อง <span>(Contact Purpose)</span></label>
                     <textarea disabled class="form-control font-thai " rows="3" id="purpose" :value="modalInfo?.purposeVisit"></textarea>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-5 pt-2 pe-0">
                           <label for="visitDate" class="font-thai">วันที่ต้องการเข้าพบ<br />
                              <span>(Visit date)</span>
                           </label>
                        </div>
                        <div class="col-7 pt-2">
                           <input disabled class="form-control " type="text" id="visitDate" :value="modalInfo?.visitDate?.split('-')?.reverse()?.join('/') " />
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
                           <label for="firstdate" class="font-thai">เข็มที่ <b>{{ k }}</b> วันที่ <br /><span class="small text-nowrap">
                                 (Date of {{ k }} dose vaccination)</span></label>
                           <input disabled class="form-control" type="text" id="firstdate" aria-label="firstdate" :value="doseDate[k-1]?.split('-').reverse().join('/')" />
                        </div>
                        <div class="col-6 pb-2">
                           <label for="vaccine1" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                                 (Name of Vaccination)</span></label>
                           <input disabled class="form-control " type="text" id="vaccine1" :value="vaccineDose[k-1]" />
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Question -->
               <div class="row mb-3">
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
                           <tr v-for="info,i in optionQuestion" :key="i">
                              <td>
                                 <p class="font-thai text-start ps-3 my-0">{{info.text}}</p>
                                 <p class="text-start small ps-3 my-0">{{info.textEng}}</p>
                              </td>
                              <td>
                                 <input v-if="question[i] == 'true'" type="radio" class="form-check-input" checked disabled>
                                 <input v-else type="radio" class="form-check-input " disabled>
                              </td>
                              <td>
                                 <input v-if="question[i] == 'false'" type="radio" class="form-check-input" checked disabled>
                                 <input v-else type="radio" class="form-check-input " disabled>
                              </td>
                           </tr>
                        </tbody>
                     </table>
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
                           <input disabled class="form-control " type="text" id="atkDate" :value="modalInfo?.atkDate?.split('-')?.reverse()?.join('/')" />
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
                           <input disabled class="form-control" type="text" :value="modalInfo?.atk">
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-6 pt-2 pe-0">
                           <p id="genInfo">Note
                           </p>
                        </div>
                        <div class="col-6">
                           <textarea disabled class="form-control" rows="3" :value="modalInfo?.note"></textarea>
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
<div class="modal fade" id="timelineModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="timelineModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title font-thai fw-bold" id="timelineModal">บันทึกการเดินทาง
               <span>(Timeline Infomation)</span>
            </h4>
            <div class="m-0 p-0">
               <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#historyModal">
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
                        <tr v-for="info,i in timeline" :key="i">
                           <td>
                              <p>{{ info.date?.split('-')?.reverse()?.join('/') }}</p>
                           </td>
                           <td>
                              <input disabled type="text" class="form-control form-control-sm font-thai" id="destination" :value="info.location">
                           </td>
                           <td>
                              <input disabled type="text" class="form-control form-control-sm font-thai" id="destination" :value="info.vehicle">
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