<div class="row p-0">
   <div class="col-12 overflow-auto" style="height: 66vh">
      <!-- GenInfo -->
      <div class="row mb-4 mt-2">
         <div class="col-12">
            <h5 class="font-thai fw-bold" id="genInfo">ข้อมูลทั่วไป
               <span class="fw-bold small">(General Information)</span>
            </h5>
         </div>
         <div class="col-6 pb-2">
            <label for="Name" class="font-thai">ชื่อ <span>(Name)</span></label>
            <input v-model="form.name" class="form-control" type="text" placeholder="Name" id="Name"
               aria-label="Name input" required />
         </div>
         <div class="col-6">
            <label for="Surname" class="font-thai">นามสกุล <span>(Surname)</span></label>
            <input v-model="form.surname" class="form-control" type="text" placeholder="Surname" id="Surname"
               aria-label="Surname input" required />
         </div>
         <div class="col-12">
            <label for="Company" class="font-thai">หน่วยงาน <span>(Organization / Company)</span></label>
            <input v-model="form.company" class="form-control" type="text" placeholder="Organization / Company"
               id="Company" aria-label="Company input" required />
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
            <input v-model="form.toVisit" class="form-control" type="text" placeholder="To Visit" id="nameVisit"
               aria-label="nameVisit" required />
         </div>
         <div class="col-12 pb-2">
            <label for="purpose" class="font-thai">ติดต่อภารกิจเรื่อง <span>(Contact Purpose)</span></label>
            <textarea v-model="form.purposeVisit" class="form-control" rows="3" id="purpose" required></textarea>
         </div>
         <div class="col-12">
            <div class="row">
               <div class="col-5 pt-2 pe-0"><label for="visitDate" class="font-thai">วันที่ต้องการเข้าพบ <span>(Visit
                        date)</span></label></div>
               <div class="col-7 ">
                  <input v-model="form.visitDate" class="form-control" type="date" id="visitDate" aria-label="visitDate"
                     required />
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
         <div class="col-12">
            <label for="vaccine" class="font-thai">จำนวนวัคซีนที่ท่านได้รับ<span class="small text-nowrap">
                  (The number of vaccines you received)</span></label>
            <!-- <input v-model="form.vaccine" type="number" class="form-control" id="vaccine" aria-label="vaccine" min="2"
               max="5" required /> -->
            <select v-model="form.vaccine" id="vaccine" aria-label="vaccine" class="form-select" required>
               <option v-for="i in 5" :value="i">
                  {{ i }}
               </option>
            </select>
            <p class="small font-thai text-secondary">หมายเหตุ: ระบุอย่างน้อย 2 เข็ม และมากสุด 5 เข็ม<br /><span
                  class="small"> (Specify at
                  least 2 dose and maximum of 5 dose.)</span></p>
         </div>
         <div v-for="k in form.vaccine" :key="k">
            <div class="row">
               <div class="col-6 pb-2">
                  <label for="firstdate" class="font-thai">เข็มที่ <b>{{ k }}</b> วันที่ <br /><span
                        class="small text-nowrap">
                        (Date of {{ k }} dose vaccination)</span></label>
                  <input v-model="form.doseDate[k-1]" class="form-control" type="date" id="firstdate"
                     aria-label="firstdate" required />
               </div>
               <div class="col-6 pb-2">
                  <label for="vaccine1" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                        (Name of Vaccination)</span></label>
                  <select v-model="form.vaccineDose[k-1]" id="vaccine1" class="form-select" required>
                     <option v-for="option in options" :value="option.value">
                        {{ option.text }}
                     </option>
                  </select>
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
               <div class="col-5 pt-2 pe-0">
                  <label for="atkDate" class="font-thai">วันที่ตรวจล่าสุด
                     <span class="text-nowrap">(Lasted ATK Test Date)</span></label>
               </div>
               <div class="col-7 pt-2">
                  <input v-model="form.atkDate" class="form-control" type="date" id="atkDate" aria-label="atkDate"
                     required />
               </div>
            </div>
         </div>
         <div class="col-12">
            <div class="row">
               <div class="col-12 col-sm-3 pt-2 pe-0">
                  <p class="font-thai" id="genInfo">ผลการตรวจ<br /><span class="text-nowrap"> (ATK Result)</span>
                  </p>
               </div>
               <div class="col-12 col-sm-9 pt-0 pt-sm-3">
                  <input v-model="form.atk" class="form-check-input" type="radio" name="check" id="Positive"
                     value="Positive">
                  <label class="form-check-label ps-1 pe-3 font-thai" for="Positive">
                     พบเชื้อ <span>(Positive)</span>
                  </label>
                  <input v-model="form.atk" class="form-check-input" type="radio" name="check" id="Negative"
                     value="Negative">
                  <label class="form-check-label ps-1 font-thai" for="Negative">
                     ไม่พบเชื้อ <span>(Negative)</span>
                  </label>
               </div>
            </div>
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
                  <select v-model="form.entourage" id="entourage" class="form-select" required>
                     <option v-for="n in 101" :value="n - 1">
                        {{ n-1 }}
                     </option>
                  </select>
               </div>

               <!-- Entourage Info -->
               <div class="row py-2 pe-0" v-for="n in form.entourage" :key="n">
                  <div class="col-12 text-center">
                     <h6 class="font-thai fw-bold" id="genInfo">ผู้ติดตามคนที่ {{ n }}
                        <span class="fw-bold small">(Entourage Information {{ n }})</span>
                     </h6>
                  </div>
                  <div class="col-6 pb-2">
                     <label for="Name" class="font-thai">ชื่อ <span>(Name)</span></label>
                     <input v-model="form.entourageInfo.name[n-1]" class="form-control" type="text" placeholder="Name"
                        id="Name" aria-label="Name input" required />
                  </div>
                  <div class="col-6">
                     <label for="Surname" class="font-thai">นามสกุล <span>(Surname)</span></label>
                     <input v-model="form.entourageInfo.surname[n-1]" class="form-control" type="text"
                        placeholder="Surname" id="Surname" aria-label="Surname input" required />
                  </div>

                  <div class="col-12">
                     <h6 class="font-thai fw-bold" id="vaccination">ข้อมูลการฉีดวัคซีน
                        <span class="fw-bold small">(COVID-19 Vaccination History)</span>
                     </h6>
                  </div>
                  <div class="col-12">
                     <label for="vaccine" class="font-thai">จำนวนวัคซีนที่ท่านได้รับ<span class="small text-nowrap">
                           (The number of vaccines you received)</span></label>
                     <!-- <input v-model="form.entourageInfo.vaccine[n-1]" type="number" class="form-control" id="vaccine"
                        aria-label="vaccine" min="2" max="5" required /> -->
                     <select v-model="form.entourageInfo.vaccine[n-1]" id="vaccine" aria-label="vaccine"
                        class="form-select" required>
                        <option v-for="i in 5" :value="i">
                           {{ i }}
                        </option>
                     </select>
                     <p class="small font-thai text-secondary">หมายเหตุ: ระบุอย่างน้อย 2 เข็ม และมากสุด 5 เข็ม
                        <br /><span class="small">
                           (Specify at least 2 dose and maximum of 5 dose.)</span>
                     </p>
                  </div>
                  <div v-for="k in form.entourageInfo.vaccine[n-1]" :key="k">
                     <div class="row">
                        <div class="col-6 pb-2">
                           <label for="firstdate" class="font-thai">เข็มที่ <b>{{ k }}</b> วันที่ <br /><span
                                 class="small text-nowrap">
                                 (Date of {{ k }} dose vaccination)</span></label>
                           <input v-model="form.entourageInfo.doseDateEn[n-1][k-1]" class="form-control" type="date"
                              id="firstdate" aria-label="firstdate" required />
                        </div>
                        <div class="col-6 pb-2">
                           <label for="vaccine1" class="font-thai">ชื่อวัคซีน <br /><span class="text-nowrap">
                                 (Name of Vaccination)</span></label>
                           <select v-model="form.entourageInfo.vaccineDoseEn[n-1][k-1]" id="vaccine1"
                              class="form-select" required>
                              <option v-for="option in options" :value="option.value">
                                 {{ option.text }}
                              </option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="col-12">
                     <h6 class="font-thai fw-bold " id="ATK">ข้อมูลการตรวจ <span>ATK</span>
                        <span class="fw-bold small">(ATK History)</span>
                     </h6>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-5 pt-2 pe-0">
                           <label for="atkDate" class="font-thai">วันที่ตรวจล่าสุด
                              <span class="text-nowrap">(Last ATK Test Date)</span></label>
                        </div>
                        <div class="col-7 pt-2">
                           <input v-model="form.entourageInfo.atkDate[n-1]" class="form-control" type="date"
                              id="atkDate" aria-label="atkDate" required />
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row">
                        <div class="col-12 col-sm-3 pt-2 pe-0">
                           <p class="font-thai" id="genInfo">ผลการตรวจ<br /><span class="text-nowrap"> (ATK
                                 Result)</span>
                           </p>
                        </div>
                        <div class="col-12 col-sm-9 ps-2 pt-sm-3">
                           <input v-model="form.entourageInfo.atk[n-1]" class="form-check-input" type="radio"
                              :name="'chk'+n" value="Positive">
                           <label class="form-check-label ps-1 pe-3 font-thai" for="Positive">
                              พบเชื้อ <span>(Positive)</span>
                           </label>
                           <input v-model="form.entourageInfo.atk[n-1]" class="form-check-input" type="radio"
                              :name="'chk'+n" value="Negative">
                           <label class="form-check-label ps-1 font-thai" for="Negative">
                              ไม่พบเชื้อ <span>(Negative)</span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <hr />
               </div>
            </div>
         </div>
      </div>
   </div>
</div>