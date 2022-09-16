using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using MultiStackApps.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Threading.Tasks;

//ToDo: Clean this method. Been ages since I programed for real.

namespace MultiStackApps.Controllers
{
    [Route("api/generate/uuid")]
    [ApiController]
    public class GenerateController : ControllerBase
    {
        [HttpGet]
        public ActionResult<GUIDEntity> Get(int? count)
        {
            if(count == null || count == 0)
            {
                Random rand = new Random();
                var aGUID = new GUIDEntity();
                aGUID.uudis = new string[1];
                aGUID.uudis[0] = GUID(rand);
                return aGUID;
            }
            else if(count < 0)
            {
                var response = new HttpResponseMessage(HttpStatusCode.BadRequest);
                response.Content = new StringContent("cannot generate less than 1 GUID.");
                throw new System.Web.Http.HttpResponseException(response);
            }
            else
            {
                var aGUID = new GUIDEntity();
                int safeCount = (int)count;
                aGUID.uudis = new string[safeCount];
                for (int i = 0; i < safeCount; i++)
                {
                    Random rand = new Random();
                    aGUID.uudis[i] = GUID(rand);
                }
                return aGUID;
            }

        }

        //GUID Segment generator
        private string e(Random rand)
        {

            return Convert.ToString(((int)(65536 * (1 + rand.NextDouble())) | 0), 16).Substring(1);
        }

        //GUID Generator
        private string GUID(Random rand)
        {
            return (e(rand) + e(rand) + "-" + e(rand) + "-" + e(rand) + "-" + e(rand) + "-" + e(rand) + e(rand) + e(rand)).ToUpper();
        }
    }
}
