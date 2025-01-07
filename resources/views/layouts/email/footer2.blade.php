<tr>
    <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about YOU!</p>
        <p style="margin-bottom:2px">You can reach us via email: <a href="mailto:{{ \App\Models\Configuration::where('key', 'contact_email')->value('value') ?? tenant()->kyc->business_email }}">{{ tenant()->kyc->business_email }}</a></p>   
    </td>
</tr>

<tr>
    <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
        <p>&copy; Copyright  
        <a href="{{ tenant()->kyc->website }}" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">{{ tenant()->id }}.</p>
    </td>
</tr>
<!--end::Email template-->
<!--end::Body-->
<!--end::Wrapper-->
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
<!--end::Body--></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</body>